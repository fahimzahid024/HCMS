<?php

namespace App\user\patiant;

use Illuminate\Database\Eloquent\Model;

class ticketBook extends Model
{
    protected $fillable = [
        'name', 'email', 'doctor_id',
    ];
}
