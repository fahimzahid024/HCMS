@extends('layouts.test')
@section('hero')
<div class="container pt-5" style="margin-top:80px;">
    <div class="card">
        
        <div class="card-header text-center">
          <h1>Patient SingUp </h1>
        </div>
        @if (session()->has('message'))
          <div class="alert alert-{{ session('type') }}">
              {{ session('message') }}
          </div>
      @endif
        <div class="card-body">
            <form action="{{ route('save-patiant') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" id="confirm_password" name="password_confirmation" class="form-control" placeholder="Confirm Password *" />
                </div>
                <button type="submit" class="btn btn-primary">Signup</button>
              </form>
        </div>
      </div>

@endsection