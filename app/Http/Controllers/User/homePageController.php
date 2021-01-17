<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\doctor\doctor;

class homePageController extends Controller
{
    public function index()
    {
        $doctorData = doctor::orderBy('doctor_id','DESC')->get();
        return view('user.landing',compact('doctorData'));
    }
    public function doctor(){
        $getData = doctor::orderBy('doctor_id','DESC')->get();
        return view('user.view_doctor',compact('getData'));
    }
    public function clinic(){
        $getData = doctor::orderBy('doctor_id','DESC')->get();
        return view('user.view_clinic',compact('getData'));
    }
}
