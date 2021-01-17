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
                        <div class="card-header text-center">
                            <h1 style="color: wheat;"> Add Clinic</h1>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="clinic_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Clinic Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="clinic_name" type="text"
                                            class="form-control @error('clinic_name') is-invalid @enderror"
                                            name="clinic_name" value="{{ old('clinic_name') }}" required
                                            autocomplete="clinic_name" autofocus>

                                        @error('clinic_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="clinic_location"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                    <div class="col-md-6">
                                        <input id="clinic_location" type="clinic_location"
                                            class="form-control @error('clinic_location') is-invalid @enderror"
                                            name="clinic_location" value="{{ old('clinic_location') }}" required
                                            autocomplete="clinic_location">

                                        @error('clinic_location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="consultancy"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Cabin') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" name="cabin" id="exampleFormControlTextarea1"
                                            class="form-control @error('cabin') is-invalid @enderror"
                                            value="{{ old('cabin') }}" required rows="3" autocomplete="cabin"
                                            autofocus></textarea>

                                        @error('cabin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="consultancy"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Cabin Price') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" name="cabin_price" id="exampleFormControlTextarea1"
                                            class="form-control @error('cabin_price') is-invalid @enderror"
                                            value="{{ old('cabin_price') }}" required rows="3" autocomplete="cabin_price"
                                            autofocus></textarea>

                                        @error('cabin_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Word') }}</label>

                                    <div class="col-md-6">
                                        <input id="word" type="text"
                                            class="form-control @error('word') is-invalid @enderror" name="word"
                                            value="{{ old('word') }}" autocomplete="word">

                                        @error('word')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Word Price') }}</label>

                                    <div class="col-md-6">
                                        <input id="word_price" type="text"
                                            class="form-control @error('word_price') is-invalid @enderror" name="word_price"
                                            value="{{ old('word_price') }}" autocomplete="word_price">

                                        @error('word_price')
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
                                        <input type="file" class="form-control" name="clinic_image" id="clinic_image"
                                            value="{{ old('clinic_image') }}">
                                        @error('clinic_image')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

                                        @error('clinic_image')
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
