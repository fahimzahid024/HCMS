<?php

namespace App\Http\Controllers\User\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\doctor\Spaciality;
use App\rating\rating;
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

    public function edit_profile($id){
        $edit_doctor = DB::table('doctors')->where('doctor_id',$id)->first();
        return view('user.doctor.edit_doctor_profile')->with('edit_doctor',$edit_doctor);
        // $delete_patient = DB::table('ticket_books')->where('patient_id',$id)->delete();
        // if($delete_patient){
        // Session::flash('message','Deleted successfully!');
        // Session::flash('type','success');
        // return redirect()->route('/');
        // }
        // else{
        //     Session::flash('message','Not Deleted!');
        //     Session::flash('type','danger');
        //     return redirect()->route('/');
        // }
    }
    public function doctor_category(){
        return view('user.doctor.category');
    }

    public function save_specialisation(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        $spacialities = new Spaciality();
        $spacialities -> name_spaciality = $request -> name;
        try{
            $spacialities->save();
            Session::flash('success','Speciality Added Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            Session::flash('success','Speciality Not Added!');
            return redirect()->back();
        }
    }

    public function category_wise_product($id){
        $doctor = DB::table('doctors')->where('doctor_specilization',$id)
                  ->join('spacialities', 'spacialities.id', '=', 'doctors.doctor_specilization')
                  ->paginate(2);
        return view('user.doctor.view_category_wise_doctor')->with('doctor', $doctor)->with('id_id',$id);
    }

    public function view_specialisation(){
        $getData = DB::table('spacialities')->get();
        return view('user.doctor.view_specialisation')->with('getData',$getData);
    }

    public function delete_category($id){
        // return $id;
        DB::table('spacialities')->where('id',$id)->delete();
        Session::flash('success', 'Spciality deleted Successfully!');
        return redirect()->back();
    }

    public function add_rating($id){
        return view('user.cabin.rating')->with('id',$id);
    }


    public function save_rating(Request $request,$id){
        $rating = new rating();
        $rating -> rating = $request->rating;
        $rating -> cabin_id = $request->id;
        $rating -> save();
        Session::flash('success','Rating Added Successfully!');
        return redirect()->route('user-view-cabin');
    }

    public function update_profile($id,Request $request){
        $update_cabin = DB::table('doctors')->where('doctor_id',$id)
                        ->update([
                        'name' => $request->name,
                        'view_patient' => $request->view_patient,
                        'doctor_email' => $request->doctor_email,
                        'doctor_specilization' => $request->doctor_specilization,
                        'doctor_phone' => $request->doctor_phone,
                        'consultency_fee' => $request->consultency_fee,
                        ]);
        if($update_cabin){
            Session::flash('success','Profile Updated Successfully!');
            return redirect()->route('doctor-profile');
        }else{
            Session::flash('success','Profile Not Updated!');
            return redirect()->route('doctor-profile');
        }
    }

    public function delete_patient($id){
        $delete_patient = DB::table('ticket_books')->where('id',$id)->delete();
        return redirect()->back();
    }
}
