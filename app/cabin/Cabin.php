<?php

namespace App\cabin;

use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    protected $fillable = [
    'cabin_number',
    'floor',
    'total_room',
    'total_bathroom',
    'total_bed',
    'image',
    'booking_status',
    'price',
];
}
