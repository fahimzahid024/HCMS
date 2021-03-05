<?php

namespace App\Http\Controllers\User\cabin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\cabin\Cabin;
use App\cabin\cabinBooking;
use Session;
use DB;
use App\Mail\BookingMail;
use Illuminate\Support\Facades\Mail;

class CabinController extends Controller
{
    public function view_cabin()
    {
        $Cabin = Cabin::paginate(2);
        return view('user.cabin.view_cabin')->with('cabin',$Cabin);
    }
    public function cabinBooking($id){
        return view('user.cabin.form')->with('id',$id);
        
     }
    public function save_cabin(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        $patient_booking = new cabinBooking();
        $patient_booking->name = $request->name;
        $patient_booking->email = $request->email;
        $patient_booking->phone = $request->phone;
        $patient_booking->cabin_id = $request->id;
        $id = $request->id;
        // dd($patient_booking);
        try{
            $get_cabin = DB::table('cabins')->where('id',$id)->first();
            $patient_booking->save();

            DB::table('cabins')->where('id',$id)
            ->update([
            'booking_status' => 'Booked',
            ]);

            Mail::to('HCMS@gmail.com')->send(new BookingMail($get_cabin));
            Session::flash('message','Booking Successfully!');
            return redirect()->route('user-view-cabin');
        }catch(\Exception $e){
            Session::flash('message',$e->getMessage());
            return redirect()->route('user-view-cabin');
        }
    }
}
