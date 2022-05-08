<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Item;
use Auth;

class Orders extends Controller
{
    
    public function makeOrder(Request $request){
        $user_id = Auth::guard('api')->user()->id;
        $itemPrice = Item::where('id',$request->item_id)->first();
        $order = Order::where('user_id',$user_id)->where('status','new')->first();
        if (empty($order)) {
            $totalPrice = $itemPrice->itemPrice * $request->quantity;
            $order = Order::create([
                'user_id' => $user_id,
                'total_price' => $totalPrice,
            ]);

        }else{
            $totalPrice = $order->total_price + ($itemPrice->itemPrice * $request->quantity);
            Order::where('id',$order->id)->update([
                'total_price' => $totalPrice,
            ]);
        }

        Order_item::create([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'sub_prop_id' => $request->sub_prop_id,
            'order_id' => $order->id,
        ]);

        $order = Order::find($order->id);

        $data['status'] = true;
        $data['order'] = $order;
        return $data;
    }




    public function userCart(){
        $user_id =Auth::guard('api')->user()->id;
        $order = Order::where('user_id',$user_id)->with('order_items')->first();
        //$orderItems = Order_item::where('order_id',$order->id)->get();

        $data['status'] = true;
        $data['order'] = $order;
        return $data;    
    }



    public function changeQuantity(Request $request ,$order_item_id){
        $order_item = Order_item::where('id',$order_item_id)->first();
        $item = Item::where('id',$order_item->item_id)->first();
        $order = Order::where('id',$order_item->order_id)->first();

        if($order_item->quantity > $request->quantity){
            $newQuantity = $order_item->quantity - $request->quantity;

            $newQuantityPrice = $newQuantity * $item->itemPrice;
            $order->total_price = $order->total_price - $newQuantityPrice;
            $order->save();
            $order_item->quantity = $request->quantity;
            $order_item->save();
        }elseif($order_item->quantity < $request->quantity){

            $newQuantity = $request->quantity - $order_item->quantity;

            $newQuantityPrice = $newQuantity * $item->itemPrice;
            $order->total_price = $order->total_price + $newQuantityPrice;
            $order->save();
            $order_item->quantity = $request->quantity;
            $order_item->save();
        }

        $data['status'] = true;
        $data['message'] = 'success';
        return $data;
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

        $data['status'] = true;
        $data['message'] = 'item deleted';
        return $data;

    }



    public function changeOrderStatus(Request $request ,$order_id){
        $order = Order::where('id',$order_id)->update([
            'status'=>$request->status,
        ]);
        $data['status'] = true;
        $data['message'] = 'order confirmed';
        return $data;

    }





    //filter

    public function searchItem($keyWord){
        $items = Item::where('itemName', 'like',"%".$keyWord."%")->paginate(25);
        if(!empty($items)){
            foreach($items as $item){
                $item->itemImage = url('Admin_uploads/items/'.$item->itemImage);
            }
        }
        $data['status'] = true;
        $data['items'] = $items ;
        
        return $data;
    }



    public function searchPrice(Request $request){
        $items = Item::whereBetween('itemPrice', [$request->min_price, $request->max_price])->orWhere('itemName','like','%'.$request->keyWord.'%')->paginate(25);
        if(!empty($items)){
            foreach($items as $item){
                $item->itemImage = url('Admin_uploads/items/'.$item->itemImage);
            }
        }
        $data['status'] = true;
        $data['items'] = $items ;
        
        return $data;
    }









}
