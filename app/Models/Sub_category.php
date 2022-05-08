<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    use HasFactory;
    protected $table = "sub_categories";
    protected $fillable = [
        "s_categoryName",
        "s_categoryNameAr",
        "s_categoryImage",
        "cat_id",
    ];


    public function items(){
        return $this->hasMany('App\Models\Item','sub_cat_id');
    }
}
