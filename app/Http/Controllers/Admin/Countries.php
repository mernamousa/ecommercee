<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use File;

class Countries extends Controller
{
    public function countryInfo(){
        $countries = Country::get();
        return view('Admin/Countries/countryInfo',compact('countries'));
    }




    public function viewCreateCountry($id=null){
        if(empty($id)){
            return view('Admin/Countries/viewCreateCountry');
        }else{
            $countries= Country::find($id);
            return view('Admin/Countries/viewCreateCountry',compact('countries'));
        }
    }





    public function createCountry(Request $request){
        $validated = $request->validate([
          'countryName' => 'required|max:100',
          'countryNameAr' => 'required|max:100',
          'countryImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
          'phoneKey' => 'max:required',
        ]);

        if(empty($request->id)){
            if ($request->hasFile('countryImage')) {
                    $destinationPath = public_path('Admin_uploads/countries/');
                    $countryImage = $request->file('countryImage');
                    $validated['countryImage'] = rand(11111, 99999).'.'.$countryImage->getClientOriginalExtension();
                    $countryImage->move($destinationPath, $validated['countryImage']);
                }
                Country::create($validated);
                session()->flash('warning','Create Done');
                return back();
        }else{
            $Country = Country::where('id',$request->id)->first();

                if ($request->hasFile('countryImage')) {
                    $destinationPath = public_path('Admin_uploads/countries/');
                    File::delete($destinationPath . $validated['countryImage']);
                    $countryImage = $request->file('countryImage');
                    $validated['countryImage'] = rand(11111, 99999).'.'.$countryImage->getClientOriginalExtension();
                    $countryImage->move($destinationPath, $validated['countryImage']);
                }
                Country::where('id',$request->id)->update($validated);
                session()->flash('warning','Update Done');
                return redirect('admin/countryInfo');
        }
    }




    public function deleteCountry($id){
        $country =Country::where('id',$id)->first();
        $destinationPath = public_path('Admin_uploads/countries/');

        File::delete($destinationPath . $country->categoryImage );
        $country->delete();
        session()->flash('warning','deleted');
        return back();

    }




    public function cityInfo($country_id){
        $data['cities'] = City::where('country_id',$country_id)->get();
        return view('Admin/Countries/citiesInfo',$data);
    }




    public function viewCreateCity($country_id ,$city_id = false){
        if(!empty($city_id)){
            $data['cities'] = City::where('id',$city_id)->first();
        }else{
            $data = [];
        }
        return view('Admin/Countries/viewCreateCity',$data);

    }




    public function createCity(Request $request){
        $validated = $request->validate([
          'cityName' => 'required|max:100',
          'cityNameAr' => 'required|max:100',
          'country_id' => 'required|max:100000',
        ]);


        $data = $request->except('_token');
        if(empty($data['id'])){
            City::create($data);

        }else{
            $city = City::find($data['id']);
            City::where('id',$data['id'])->update($data);
        }

        session()->flash('success','Done successfully');
        return redirect('admin/cityInfo/'.$data['country_id']);

    }




    public function deleteCity($id){
        $city =City::where('id',$id)->first();
        $city->delete();
        session()->flash('warning','deleted');
        return back();
    }

}
