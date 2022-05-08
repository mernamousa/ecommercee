<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item_prop;
class Item extends Model
{
    use HasFactory;

    protected $table = "items";
    protected $fillable = [
        'itemName',
        'itemNameAr',
        'itemDesc',
        'itemDescAr',
        'itemImage',
        'itemPrice',
        'itemDiscount',
        'discountType',//['fixed','percent']
        'itemAvailable',//boolean
        'sub_cat_id'
    ];


    
    public function item_props(){
        return $this->hasMany(Item_prop::class,'item_id');
    }

    
}
