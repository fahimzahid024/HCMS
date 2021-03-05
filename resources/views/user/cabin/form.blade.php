@extends('layouts.test')
@section('hero')
@php   
$patient_info = DB::table('patiants')->where('id',Session::get('patient_id'))->first();
@endphp
<div class="container pt-5" style="margin-top:80px;">
    <div class="card">
        
        <div class="card-header text-center">
          <h1>Cabin Booking </h1>
        </div>
        @if (session()->has('message'))
          <div class="alert alert-{{ session('type') }}">
              {{ session('message') }}
          </div>
      @endif
        <div class="card-body">
            <form action="{{ route('save-cabin-booking') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" value="{{$patient_info->name}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" value="{{$patient_info->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone</label>
                  <input type="phone" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Phone">
                </div>
                
                <button type="submit" class="btn btn-primary">Cabin Booking</button>
              </form>
        </div>
      </div>

@endsection