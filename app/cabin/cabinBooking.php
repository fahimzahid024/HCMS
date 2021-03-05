<?php

namespace App\cabin;

use Illuminate\Database\Eloquent\Model;

class cabinBooking extends Model
{
    protected $fillable = [
    'name',
    'email',
    'phone',
    'cabin_id',
    ];
}
