@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">
                        @if (Session('success'))
                            <div class="alert bg-success">
                                <a href="#" class="close" data-dismiss="alert">×</a>
                                {{ Session('success') }}
                            </div>
                        @endif
                        @if (Session('error'))
                            <div class="alert bg-danger">
                                <a href="#" class="close" data-dismiss="alert">×</a>
                                {{ Session('error') }}
                            </div>
                        @endif
                        <div class="card-header">
                            <div class="text-center">
                                <h1 style="color: wheat;" > Add Doctor</h1>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('view-doctor') }}"><button class="btn btn-success" style="color: wheat;"> View Doctor</button></a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('save-doctor') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Doctor Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="consultancy"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Doctor Specialization') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" name="doctor_specilaization" id="exampleFormControlTextarea1"
                                            class="form-control @error('doctor_specilaization') is-invalid @enderror"
                                            value="{{ old('doctor_specilaization') }}" required rows="3" autocomplete="degree"
                                            autofocus></textarea>

                                        @error('doctor_specilaization')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="doctor_phone" type="text"
                                            class="form-control @error('doctor_phone') is-invalid @enderror" name="doctor_phone"
                                            value="{{ old('doctor_phone') }}" required autocomplete="doctor_phone">

                                        @error('doctor_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Consultency Fee') }}</label>

                                    <div class="col-md-6">
                                        <input id="consultency_fee" type="text"
                                            class="form-control @error('consultency_fee') is-invalid @enderror" name="consultency_fee"
                                            value="{{ old('consultency_fee') }}" required autocomplete="consultency_fee">

                                        @error('consultency_fee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="password_confirmation"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Doctor Image') }}</label>

                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="image" id="image"
                                            value="{{ old('image') }}">
                                        @error('image')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Add Doctor') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
