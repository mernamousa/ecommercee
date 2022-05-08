<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_prop extends Model
{
    use HasFactory;
    protected $table = "item_props";
    protected $fillable = [
        'item_id',
        'prop_id',
        'sub_prop_id',
    ]; 
    
}
