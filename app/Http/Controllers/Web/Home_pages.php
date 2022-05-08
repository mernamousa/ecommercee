<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sub_category;
use App\Models\Item;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Item_prop;
use App\Models\Sub_property;
use App\Models\FavItem;
use App\Models\User;
use Session;
use Str;



class Home_pages extends Controller
{

    public function homePage(){
        $data['sub_categories'] = Sub_category::with('items')->get();    
        return view('General/Home/welcome',$data);
    }




    public function categoryItems($s_category_id){
        //header categories
        $data['sub_categories'] = Sub_category::get();

        //category item
        $data['sub_category'] = Sub_category::where('id',$s_category_id)->with('items')->first();
        return view('General/Category/categoryInfo',$data);
    }




    public function makeOrder($item_id){   
        $session_token = Session::get('remember_token');
        $user = User::where('remember_token',$session_token)->first();
        $user_id = $user->id;

        $item = Item::where('id',$item_id)->first();
        $order = Order::where('user_id',$user_id)->where('status','new')->first();
        if (empty($order)) {
            $totalPrice = $item->itemPrice;
            $order = Order::create([
                'user_id' => $user_id,
                'total_price' => $totalPrice,
                'status' => 'new',
            ]);
        }else{
            $totalPrice = $order->total_price + $item->itemPrice;
            Order::where('id',$order->id)->update([
                'total_price' => $totalPrice,
            ]);
        }
        $prop = Item_prop::where('item_id',$item_id)->first();

        $orderItem = Order_item::where('order_id',$order->id)->where('item_id',$item_id)->first();

        if (!empty($orderItem)) {
            $orderItem->quantity =  $orderItem->quantity + 1;
            $orderItem->save();
        }else{
            Order_item::create([
                'item_id' => $item_id,
                'quantity' => 1,
                'sub_prop_id' => $prop->sub_prop_id,
                'order_id' => $order->id,
            ]);
        }

        $order = Order::find($order->id);
        return back();
    }




    public function user_cart(){
        $token = Session::get('remember_token');
        $user = User::where('remember_token',$token)->first();
        $data['sub_categories'] = Sub_category::get();

        $data['order'] = Order::where('user_id',$user->id)->where('status','new')->with('order_items')->first();
        if (!empty($data['order'])) {
            $data['items'] = Order_item::where('order_id', $data['order']->id)->get();


            if (!empty($data['items'])) {
                foreach($data['items'] as $item){
                    $mainItem = Item::find($item->item_id);
                    $s_prop = Sub_property::find($item->sub_prop_id);

                    $item->itemName = $mainItem->itemName;
                    $item->itemPrice = $mainItem->itemPrice;
                    $item->itemDiscount = $mainItem->itemDiscount;
                    $item->s_propertyName = $s_prop->s_propertyName;
                    $item->itemImage = $mainItem->itemImage;
                }
            }

            return view('General/Order/orderInfo',$data);
        }else{

            session()->flash('success','cart is empty');
            return back();
        }
                  
    }





    public function confirm_order($order_id){
        $order = Order::where('id',$order_id)->update([
            "status" => 'confirmed',
        ]);

        session()->flash('success','order status changed');
        return back();
    }



    public function changeQuantityPlusMinus($order_item_id,$operation){
        $order_item = Order_item::find($order_item_id);
        $main_item = Item::find($order_item->item_id);
        $order = Order::find($order_item->order_id);

        if($operation == 'plus'){
            $order_item->quantity = $order_item->quantity + 1;
            $order->total_price = $order->total_price + $main_item->itemPrice;

        }elseif($operation == 'minus' && $order_item->quantity > 1){
            $order_item->quantity = $order_item->quantity - 1;
            $order->total_price = $order->total_price - $main_item->itemPrice;
        }

        $order_item->save();
        $order->save();

        $data['status'] = true;
        $data['message'] = 'success';
        return $data;
    }




    public function deleteItem(Request $request ,$order_item_id){
        $order_item = Order_item::where('id',$order_item_id)->first();//item
        $order = Order::where('id',$order_item->order_id)->first();//totalPrice
        $itemPrice = Item::where('id',$order_item->item_id)->first();//itemPrice
        $newTotalPrice =$order->total_price - ($itemPrice->itemPrice * $order_item->quantity);

        $order->update(['total_price'=>$newTotalPrice]);
        $order_item->delete();

        if($newTotalPrice == 0) {
            $order->delete();
        }

        session()->flash('success','order item deleted');
        return redirect('/');

    }




    public function bestSeller(){
        $item_ids = Order_item::pluck('item_id');
        $items = Item::whereIn('id',$item_ids)->get();
        $sub_categories = Sub_category::get();
        return view('General/Home/bestSeller',compact('items','sub_categories'));
    }



    public function offers(){
        $items = Item::where('itemDiscount','!=',0)->get();
        $sub_categories = Sub_category::get();
        return view('General/Home/bestSeller',compact('items','sub_categories'));

    }




    public function recently(){
        $items = Item::orderBy('id','desc')->get();
        $sub_categories = Sub_category::get();
        return view('General/Home/bestSeller',compact('items','sub_categories'));

    }



    public function add_to_fav($item_id){
        $token = Session::get('remember_token');
        $user = User::where('remember_token',$token)->first();

        $fav_item = FavItem::where('item_id',$item_id)->where('user_id',$user->id)->first();
        if (empty($fav_item)) {
            FavItem::create([
               'item_id'=>$item_id,
               'user_id'=>$user->id,
            ]);
        }else{
            $fav_item->delete();
        }
        return back();
    }



    public function favItems(){
        $token = Session::get('remember_token');
        $user = User::where('remember_token',$token)->first();
        $sub_categories = Sub_category::get();

        $fav_item = FavItem::where('user_id',$user->id)->pluck('item_id');
        
        $items = Item::wherein('id',$fav_item)->get();
        return view('General/Home/bestSeller',compact('items','sub_categories'));

    }

    public function search(Request $request){
        $sub_categories = Sub_category::get();
        $items = Item::where('itemName','like','%'.$request->searchKey.'%')
        ->orWhere('itemNameAr','like','%'.$request->searchKey.'%')
        ->orWhere('itemDesc','like','%'.$request->searchKey.'%')
        ->orWhere('itemDescAr','like','%'.$request->searchKey.'%')
        ->get();
        return view('General/Home/bestSeller',compact('items','sub_categories'));
    }



    public function searchByPrice(Request $request){
    $sub_categories = Sub_category::get();
    if($request->priceFrom && $request->priceTo){
        $items = Item::where('itemPrice','>=',$request->priceFrom)
        ->where('itemPrice','<=',$request->priceTo)->get();
    }
    return view('General/Home/bestSeller',compact('items','sub_categories'));

    }




}
