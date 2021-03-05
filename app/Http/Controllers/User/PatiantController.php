<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User\patiant\Patiant;
use App\User\patiant\ticketBook;
use Session;
use DB;

class PatiantController extends Controller
{
    public function signup(){
        return view('user.signup');
    }

    public function signin(){
        return view('user.signin');
    }
    
    public function save_patiant(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:patiants,email',
            'password' => 'required|min:6|confirmed'
        ]);
        $patiant = new Patiant();
        $patiant->name = $request->name;
        $patiant->email = $request->email;
        $patiant->password = md5($request->password);
        try{
            $patiant->save();
            Session::flash('message','Patiant saved Successfully!');
            Session::flash('type','success');
            return redirect()->back();

        }catch(\Exception $e){
            Session::flash('message','Patiant Not saved Successfully!');
            Session::flash('type','danger');
            return redirect()->back();

        }

    }

    public function login_patiant(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        $email = $request->email;
        $password = MD5($request->password) ;
    
        $result = DB::table('patiants')
                ->where('email',$email)
                ->where('password',$password)
                ->first();
        
        if($result){
            $user_name =  $result->name;
            $user_id = $result->id;
            Session::put('patient_name',$user_name);
            Session::put('patient_id',$user_id);
            Session::flash('message','Logged in successfully!');
            Session::flash('type','success');
            return redirect()->back();
        }
        else{
            Session::flash('message','Email And Password Not Match!');
            Session::flash('type','danger');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->route('/');
    }

    public function patient_booking($id){
        return view('user.doctor.form')->with('id',$id);
    }

    public function save_ticket_booking(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
        ]);
        // dd($_REQUEST);
        $patient_booking = new ticketBook();
        $patient_booking->name = $request->name;
        $patient_booking->email = $request->email;
        $patient_booking->doctor_id = $request->id;
        try{
            $patient_booking->save();
            Session::flash('message','Patient Ticket Booking successfully!');
            Session::flash('type','success');
            return redirect()->route('/');

        }catch(\Exception $e){
            Session::flash('message',$e->getMessage());
            Session::flash('type','danger');
            return redirect()->back();
        }
    }

    // public function test()
    // {

    //     $encrypted = \Crypt::encryptString('Hello world.');

    //     $decrypted = \Crypt::decryptString($encrypted);
    //     dd( $encrypted,$decrypted );
    // }
}
