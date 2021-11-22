<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class,'user_products','product_id');
    }

    public function userProduct(){
        return $this->hasMany(UserProduct::class,'product_id');
    }
}
