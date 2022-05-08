<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = "properties";
    protected $fillable = [
        "propertyName",
        "propertyNameAr",
        "propertyImage",
    ];

    public function sub_props(){
        return $this->hasMany('App\Models\Sub_property','prop_id');
    }

}
