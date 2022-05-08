<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Sub_category;
use App\Models\Property;
use App\Models\Sub_property;
use App\Models\Item_prop;
use File;

class Items extends Controller
{
    public function itemsInfo(){
        $items = Item::get();
        return view('Admin/Items/itemsInfo',compact('items'));
    }




    public function viewCreateItem($id=null){
        $sub_cats = Sub_category::get();
        $properties = Property::with('sub_props')->get();

        if(empty($id)){
            return view('Admin/Items/viewCreateItem',compact('sub_cats','properties'));
        }else{
            $items = Item::find($id);
            $selectedProps = Item_prop::where('item_id',$items->id)->pluck('sub_prop_id')->toArray();

            return view('Admin/Items/viewCreateItem',compact('sub_cats','items','properties','selectedProps'));
        }
    }




    public function createItem(Request $request){
        $validated = $request->validate([
            'itemName' => 'required|max:100',
            'itemNameAr' => 'required|max:100',
            'itemDesc' => 'required|max:5000',
            'itemDescAr' => 'required|max:5000',
            'itemPrice' => 'required|integer|max:1000000',
            'itemDiscount' => 'required|integer',
            'discountType' => 'required|in:fixed,percent',
            'itemImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'sub_cat_id' => 'required|integer',
            //'prop_id' => 'required|integer',
            'sub_prop_id' => 'required',
        ]);


        unset($validated['sub_prop_id']);
        //return $validated;
        if(empty($request->id)){
            if ($request->hasFile('itemImage')) {
                $destinationPath = public_path('Admin_uploads/items/');
                $itemImage = $request->file('itemImage');
                $validated['itemImage'] = rand(11111, 99999).'.'.$itemImage->getClientOriginalExtension();
                $itemImage->move($destinationPath, $validated['itemImage']);
            }

            $item = Item::create($validated);
            session()->flash('warning','Create Done');
        }else{
            $item = Item::where('id',$request->id)->first();
            //delete old proprites
            Item_prop::where('item_id',$item->id)->delete();

            if ($request->hasFile('itemImage')) {
                $destinationPath = public_path('Admin_uploads/items/');
                File::delete($destinationPath . $validated['itemImage']);
                $itemImage = $request->file('itemImage');
                $validated['itemImage'] = rand(11111, 99999).'.'.$itemImage->getClientOriginalExtension();
                $itemImage->move($destinationPath, $validated['itemImage']);
            }
            Item::where('id',$request->id)->update($validated);
            session()->flash('warning','Update Done');
        }

        if (is_array($request->sub_prop_id)) {
            foreach($request->sub_prop_id as $s_prop){
                $subProp = Sub_property::find($s_prop);
                $s_prop_id = $s_prop;
                $mainProp_id = $subProp->prop_id;

                Item_prop::create([
                    'item_id' => $item->id,
                    'prop_id' => $mainProp_id,
                    'sub_prop_id' => $s_prop_id,

                ]);
            }
        }

        return redirect('admin/itemsInfo');
    }




    public function deleteItem($id){
        $item =Item::where('id',$id)->first();
        $destinationPath = public_path('Admin_uploads/items/');

        File::delete($destinationPath . $item->itemImage );
        $item->delete();
        session()->flash('warning','deleted');
        return back();
    }



    //ajax request javascript
    public function sub_props($prop_id){
        $data['status'] = true;
        $data['sub_props'] = Sub_property::where('prop_id',$prop_id)->get();
        if(empty($data['sub_props'])){
            $data['status'] = false;
        }
        return $data;

    }




}
