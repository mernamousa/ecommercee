<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Sub_property;
use File;


class Properties extends Controller
{
    public function PropertyInfo(){
        $properties = Property::get();
        return view('Admin/Property/propertyInfo',compact('properties'));
    }




    public function viewCreateProperty($id=null){
        if(empty($id)){
            return view('Admin/Property/viewCreateProperty');
        }else{
            $properties= Property::find($id);
            return view('Admin/Property/viewCreateProperty',compact('properties'));
        }
    }




    public function createProperty(Request $request){
        $validated = $request->validate([
          'propertyName' => 'required|max:100',
          'propertyNameAr' => 'required|max:100',
          'propertyImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        if(empty($request->id)){
            if ($request->hasFile('propertyImage')) {
                    $destinationPath = public_path('Admin_uploads/properties/');
                    $propertyImage = $request->file('propertyImage');
                    $validated['propertyImage'] = rand(11111, 99999).'.'.$propertyImage->getClientOriginalExtension();
                    $propertyImage->move($destinationPath, $validated['propertyImage']);
                }
                Property::create($validated);
                session()->flash('warning','Create Done');
                return back();
        }else{
            $Property = Property::where('id',$request->id)->first();

                if ($request->hasFile('propertyImage')) {
                    $destinationPath = public_path('Admin_uploads/properties/');
                    File::delete($destinationPath . $validated['propertyImage']);
                    $propertyImage = $request->file('propertyImage');
                    $validated['propertyImage'] = rand(11111, 99999).'.'.$propertyImage->getClientOriginalExtension();
                    $propertyImage->move($destinationPath, $validated['propertyImage']);
                }
                Property::where('id',$request->id)->update($validated);
                session()->flash('warning','Update Done');
                return redirect('admin/PropertyInfo');
        }

    }




    public function deleteProperty($id){
        $property =Property::where('id',$id)->first();
        $destinationPath = public_path('Admin_uploads/properties/');

        File::delete($destinationPath . $property->propertyImage );
        $property->delete();
        session()->flash('warning','deleted');
        return back();
    }






//sub_properties
    public function sub_propertyInfo($prop_id){
        $data['sub_properties'] = Sub_property::where('prop_id',$prop_id)->get();
        return view('Admin/Property/sub_propertyInfo',$data);

    }




    public function sub_viewCreateProperty($prop_id ,$sub_prop_id = false){
        if(!empty($sub_prop_id)){
            $data['sub_prop'] = Sub_property::where('id',$sub_prop_id)->first();
        }else{
            $data = [];
        }
        return view('Admin/Property/sub_viewCreateProperty',$data);
    }




    public function sub_createProperty(Request $request){
        $validated = $request->validate([
          's_propertyName' => 'required|max:100',
          's_propertyNameAr' => 'required|max:100',
          's_propertyImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'prop_id' => 'required|max:100000',
        ]);

        $data = $request->except('_token');
        if(empty($data['id'])){
            
            $data['s_propertyImage'] = null;

            if ($request->hasFile('s_propertyImage')) {
                $destinationPath = public_path('Admin_uploads/properties/subProperty/');
                $s_propertyImage = $request->file('s_propertyImage');
                $data['s_propertyImage'] = rand(11111, 99999).'.'.$s_propertyImage->getClientOriginalExtension();
                $s_propertyImage->move($destinationPath, $data['s_propertyImage']);
            }
            Sub_property::create($data);

        }else{
            $s_property = Sub_property::find($data['id']);
            $data['s_propertyImage'] = $s_property->s_propertyImage;

            if ($request->hasFile('s_propertyImage')) {
                $destinationPath = public_path('Admin_uploads/properties/subProperty/');
                File::delete($destinationPath . $data['s_propertyImage']);
                $s_propertyImage = $request->file('s_propertyImage');
                $data['s_propertyImage'] = rand(11111, 99999).'.'.$s_propertyImage->getClientOriginalExtension();
                $s_propertyImage->move($destinationPath, $data['s_propertyImage']);
            }
            Sub_property::where('id',$data['id'])->update($data);
        }

        session()->flash('success','Done successfully');
        return redirect('admin/sub_propertyInfo/'.$data['prop_id']);

    }




    public function sub_deleteProperty($id){
        $Sub_property =Sub_property::where('id',$id)->first();
        $destinationPath = public_path('Admin_uploads/properties/');

        File::delete($destinationPath . $Sub_property->categoryImage );
        $Sub_property->delete();
        session()->flash('warning','deleted');
        return back();
    }






}
