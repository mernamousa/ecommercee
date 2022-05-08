<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [

        'quantity',
        'item_id',
        'sub_prop_id',
        'order_id',

    ];
}
