<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_property extends Model
{
    use HasFactory;
    protected $table = "sub_properties";
    protected $fillable = [
        "s_propertyName",
        "s_propertyNameAr",
        "s_propertyImage",
        "prop_id",
    ];
}
