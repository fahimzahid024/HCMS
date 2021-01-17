<?php

namespace App\product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'image','product_des','price','cat_id',
    ];
}
