<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class DoctorController extends Controller
{
    public function view_doctor(){
        $doctor = DB::table('doctors')
        ->join('spacialities', 'spacialities.id', '=', 'doctors.doctor_specilization')
        ->paginate(2);
        $doctor_degree = DB::table('spacialities')->paginate(9);
        return view('user.doctor.view_doctor')->with('doctor', $doctor)->with('doctor_degree', $doctor_degree);
    }
}
