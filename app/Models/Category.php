<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sub_category;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        "categoryName",
        "categoryNameAr",
        "categoryImage",
    ];


    public function cat_with_sub(){
        return $this->hasMany(Sub_category::class,'cat_id');
    }

    
}
