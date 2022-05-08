<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        "user_id", //foreign key
        "status",//[new,confirmed,inProcess,ready,delivery,completed,cancle,refused]
        "total_price",
        "ship_address",
        "ship_date",
        //"delivery_id",
    ];


    public function order_items(){
        return $this->hasMany('App\Models\Order_item','order_id');
    }
}
