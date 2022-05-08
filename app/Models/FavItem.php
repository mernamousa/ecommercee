<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavItem extends Model
{
    use HasFactory;
    protected $table = 'fav_items';
    protected $fillable = [

        'item_id',
        'user_id',

    ];
}
