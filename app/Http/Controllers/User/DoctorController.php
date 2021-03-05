<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class DoctorController extends Controller
{
    public function view_doctor(){
        $doctor = DB::table('doctors')->paginate(2);
        return view('user.doctor.view_doctor')->with('doctor', $doctor);
    }
}
