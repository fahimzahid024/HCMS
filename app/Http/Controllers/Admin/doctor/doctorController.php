<?php

namespace App\Http\Controllers\Admin\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\doctor\doctor;
use Session;


class doctorController extends Controller
{
    public function add_doctor()
    {
        return view('Admin.doctor.add_doctor');
    }
    public function save_doctor(Request $request)
    {
        if($files = $request -> file('image'))
        {
            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage);
            
            
            $doctor = new doctor();
            $doctor -> name = $request -> name;
            $doctor -> doctor_email = $request -> email;
            $doctor -> doctor_degree = $request -> degree;
            $doctor -> institute_professor = $request -> institute_professor;
            $doctor -> doctor_phone = $request -> phone;
            $doctor -> duty_time = $request -> duty;
            $doctor -> patient_view = $request -> view_patient;
            $doctor -> image = "$profileImage";
            $doctor->save();
            Session::flash('success','Doctor Added Successfully!');
            return redirect()->back();
        }
        Session::flash('error','Oops something wrong!');
            return redirect()->back();
    }
    public function manage_doctor(){
        $getData = doctor::orderBy('doctor_id','DESC')->get();
        return view('Admin.doctor.manage_doctor',compact('getData'));
    }

}