@extends('layouts.test')
@section('hero')
@php   
$patient_info = DB::table('patiants')->where('id',Session::get('patient_id'))->first();
@endphp
<div class="container pt-5" style="margin-top:80px;">
    <div class="card">
        
        <div class="card-header text-center">
          <h1>Edit Profile</h1>
        </div>
        @if (session()->has('message'))
          <div class="alert alert-{{ session('type') }}">
              {{ session('message') }}
          </div>
      @endif
        <div class="card-body">
            <form action="{{ url('/update-profile/'.$edit_doctor->doctor_id) }}" method="post">
                @csrf
                {{-- <input type="hidden" name="id" value="{{ $id }}"> --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" value="{{$edit_doctor->name}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">View Patient</label>
                  <input type="text" class="form-control" name="view_patient" value="{{$edit_doctor->view_patient}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="doctor_email" value="{{$edit_doctor->doctor_email}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Spciality</label>
                        <input type="√" class="form-control" name="doctor_specilization" value="{{$edit_doctor->doctor_specilization}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="√" class="form-control" name="doctor_phone" value="{{$edit_doctor->doctor_phone}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fee</label>
                            <input type="√" class="form-control" name="consultency_fee" value="{{$edit_doctor->consultency_fee}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                <button type="submit" class="btn btn-primary">Edit Profile</button>
              </form>
        </div>
      </div>

@endsection