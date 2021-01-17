<?php

namespace App\doctor;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $fillable = [
        'name', 'doctor_email', 'doctor_degree','institute_professor', 'doctor_phone', 'duty_time','patient_view'
        ,'image',
    ];
}

