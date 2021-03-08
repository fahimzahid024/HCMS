<?php

namespace App\rating;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $fillable = [
        'cabin_id','rating',
    ];
}
