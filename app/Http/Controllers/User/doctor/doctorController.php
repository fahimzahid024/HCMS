<?php

namespace App\Http\Controllers\User\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class doctorController extends Controller
{
    public function index(){
        return view('user.doctor.doctor_login');
    }

    public function doctor_login_process(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $email = $request->email;
        $password = $request->password;
        
        $result = DB::table('doctors')
                ->where('doctor_email',$email)
                ->where('doctor_phone',$password)
                ->first();
        // return $result;
        if($result){
            $doctor_name =  $result->name;
            $doctor_id = $result->doctor_id;
            Session::put('doctor_name',$doctor_name);
            Session::put('doctor_id',$doctor_id);
            Session::flash('message','Logged in successfully!');
            Session::flash('type','success');
            return redirect()->route('/');
        }
        else{
            Session::flash('message','Email And Password Not Match!');
            Session::flash('type','danger');
            return redirect()->route('/');
        }
    }

    public function doctor_profile(){
        return view('user.doctor.doctor_profile'); 
    }

    public function delete_patient($id){
        $delete_patient = DB::table('ticket_books')->where('patient_id',$id)->delete();
        if($delete_patient){
        Session::flash('message','Deleted successfully!');
        Session::flash('type','success');
        return redirect()->route('/');
        }
        else{
            Session::flash('message','Not Deleted!');
            Session::flash('type','danger');
            return redirect()->route('/');
        }
    }
}
