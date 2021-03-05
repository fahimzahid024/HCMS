<?php

namespace App\Http\Controllers\Admin\cabin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\cabin\Cabin;
use Session;
use DB;

class CabinController extends Controller
{
    public function manage_cabin(){
        return view('Admin.Cabin.add_cabin');
    }

    public function save_cabin(Request $request){
        $this->validate($request,[
            'cabin_number' => 'required|integer|unique:cabins,cabin_number',
            'cabin_room' => 'required|integer',
            'floor' => 'required|integer',
            'bathroom' => 'required|integer',
            'total_bed' => 'required|integer',
            'price' => 'required',
            'image' => 'required|image|file|mimes:jpeg,png,PNG,jpg,gif,svg|max:2048'
        ]);
        $cabin = new Cabin();
        $cabin->cabin_number = $request->cabin_number;
        $cabin->floor = $request->floor;
        $cabin->total_room = $request->cabin_room;
        $cabin->total_bathroom = $request->bathroom;
        $cabin->total_bed = $request->total_bed;
        $cabin->price = $request->price;
        if($files = $request -> file('image'))
        {
            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage);
            $cabin->image = "$profileImage";
        }
        else{
            $cabin->image -> image = "null";
        }
        try{
            $cabin->save();
            Session::flash('success','Cabin Added Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            Session::flash('success','Cabin Not Added!');
            return redirect()->back();

        }
    }

    public function view_cabin(){
        $cabin_data = Cabin::get();
        return view('Admin.Cabin.view_cabin')->with('cabin',$cabin_data);
    }

    public function delete_cabin($id){
        $delete_cabin = Cabin::where('id',$id)->delete();
        if($delete_cabin){
            Session::flash('success','Cabin Deleted Successfully!');
            return redirect()->back();
        }
        else{
            Session::flash('success','Cabin Not Deleted!');
            return redirect()->back();
        }
    }

    public function edit_cabin($id){
        $editCabin = Cabin::where('id',$id)->first();
        return view('Admin.Cabin.edit_cabin')->with('cabin',$editCabin);
    }

    public function update_cabin($id,Request $request){
        $update_cabin = DB::table('cabins')->where('id',$id)
                        ->update([
                        'cabin_number' => $request->cabin_number,
                        'total_room' => $request->cabin_room,
                        'floor' => $request->floor,
                        'total_bathroom' => $request->bathroom,
                        'total_bed' => $request->total_bed,
                        ]);
        if($update_cabin){
            Session::flash('success','Cabin Updated Successfully!');
            return redirect()->route('view-cabin');
        }else{
            Session::flash('success','Cabin Not Updated!');
            return redirect()->route('view-cabin');
        }
    }

    public function cabin_booking_manage(){
        $cabinBooking = DB::table('cabin_bookings')->get();
        return view('Admin.Cabin.cabin_booking_manage')->with('cabinBooking',$cabinBooking);
    }

    public function confirm_cabin($id){
        DB::table('cabin_bookings')->where('id',$id)->update(['confirm'=>'Confirm']);
        Session::flash('success','Cabin Confirm Successfully!');
        return redirect()->back();
    }

    public function dismiss_cabin($id){
        // dd($id);
        $cabin_id = DB::table('cabin_bookings')->where('id',$id)->first();
        DB::table('cabin_bookings')->where('id',$id)->delete();
        // dd($cabin_id->cabin_id);
        DB::table('cabins')->where('id',$cabin_id->cabin_id)->update(['booking_status'=>'Not Booking']);
        Session::flash('success','Cabin Dismiss Successfully!');
        return redirect()->back();

    }
}