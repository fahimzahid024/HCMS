<?php

namespace App\Http\Controllers\Admin\clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class clinicController extends Controller
{
    public function add_clinic()
    {
        return view('Admin.clinic.add_clinic'); 
    }
}
