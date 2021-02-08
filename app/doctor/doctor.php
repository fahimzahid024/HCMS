<?php

namespace App\doctor;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $fillable = [
        'name', 'doctor_email', 'doctor_specilization', 'doctor_phone', 'consultency_fee'
        ,'image','password',
    ];
}

