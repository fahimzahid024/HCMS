<?php

namespace App\category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'image','cat_des',
    ];
}
