<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class Orders extends Controller
{
    public function ordersInfo(){
        $data['orders']= Order::with('order_items')->get();
        return view('Admin/Orders/orderInfo',$data);
    }




    public function deleteOrder(Request $request ,$order_id){
        $order = Order::where('id',$order_id)->delete();
        session()->flash('success','order item deleted');
        return back();

    }



    public function changeOrderStatus($order_id,$status){
        Order::where('id',$order_id)->update(['status'=>$status]);
        session()->flash('success','order status changed to '.$status);
        return back();
    }








}
