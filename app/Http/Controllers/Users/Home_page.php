<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Item;
use Validator;
use Auth;
use Str;
use Hash;
use File;


class Home_page extends Controller
{


    public function categoriesInfo(){
        $categories = Category::get();
        $data['status'] = true;
        $data['categories'] = $categories ;
        
        return $data;
    }




    public function sub_categoriesInfo($cat_id){
        $sub_categories = Sub_category::where('cat_id',$cat_id)->get();
        $data['status'] = true;
        $data['sub_categories'] = $sub_categories ;
        
        return $data;
    }




    public function itemsInfo($sub_cat_id){
        $items = Item::where('sub_cat_id',$sub_cat_id)->paginate(25);
        if(!empty($items)){
            foreach($items as $item){
                $item->itemImage = url('Admin_uploads/items/'.$item->itemImage);
            }
        }
        $data['status'] = true;
        $data['items'] = $items ;
        
        return $data;
    }



    public function item($id){
        $item = Item::where('id',$id)->with('item_props')->first();
        if(!empty($item)){
            $item->itemImage = url('Admin_uploads/items/'.$item->itemImage);
        }
        $data['status'] = true;
        $data['item'] = $item ;
        
        return $data;
    }




   







}
