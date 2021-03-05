<?php

namespace App\Http\Controllers\Admin\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\doctor\doctor;
use App\Mail\doctor_mail;
use Illuminate\Support\Facades\Mail;
use Session;
use DB;


class doctorController extends Controller
{
    public function add_doctor()
    {
        return view('Admin.doctor.add_doctor');
    }
    public function save_doctor(Request $request)
    {
        

        $this->validate($request,[
            'name' => 'required',
            'view_patient' => 'required',
            'email' => 'required|email',
            'doctor_specilaization' => 'required',
            'doctor_phone' => 'required',
            'consultency_fee' => 'required',
            'image' => 'required|image|file|mimes:jpeg,png,PNG,jpg,gif,svg|max:2048'
        ]);
        if($files = $request -> file('image'))
        {
            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage);
            
            
            $doctor = new doctor();
            $doctor -> name = $request -> name;
            $doctor -> doctor_email = $request -> email;
            $doctor -> doctor_specilization = $request -> doctor_specilaization;
            $doctor -> doctor_phone = $request -> doctor_phone;
            $doctor -> view_patient = $request -> view_patient;
            $doctor -> consultency_fee = $request -> consultency_fee;
            $doctor -> image = "$profileImage";
            $doctor->save();
            Mail::to($doctor->doctor_email)->send(new doctor_mail($doctor));
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
    public function delete_doctor($id){
        $delete_doctor = doctor::where('doctor_id',$id)
                         ->delete();
        Session::flash('success','Doctor Deleted Successfully!');
        return redirect()->back();
    }

    public function doctor_login(){
        return view('Admin.doctor.doctor_login');
    }

    public function doctor_login_process(Request $request){
        // $this->validate($request,[
        //     'email' => 'required|email',
        //     'phone' => 'required',
        // ]);
        
        $email = $request->email;
        $password = $request->phone;
        dd($email,$password);
        
    
        $result = DB::table('doctors')
                ->where('doctor_email',$email)
                ->where('doctor_phone',$password)
                ->get();
        
        $user_id = '';
        $user_name = '';
        
        foreach ($result as $p) {
            $user_name =  $p->name;
            $user_id = $p->doctor_id;
        }


        
        if($user_name == null){
            Session::flash('success','Email or Password Not Match!');
            return redirect()->back(); 
            
        }else{
            Session::put('doctor_name',$user_name);
            Session::put('doctor_id',$user_id);
            Session::flash('success','Logged in successfully!');
            Session::flash('type','success');
            return redirect()->route('doctor-profile');   
        }

    }


    

}