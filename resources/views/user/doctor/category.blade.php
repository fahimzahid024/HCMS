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
                        @if (Session('error'))
                            <div class="alert bg-danger">
                                <a href="#" class="close" data-dismiss="alert">×</a>
                                {{ Session('message') }}
                            </div>
                        @endif
                        <div class="card-header">
                            <div class="text-center">
                                <h1 style="color: wheat;">Add Spaciality</h1>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('view-specialisation') }}"><button class="btn btn-success" style="color: wheat;"> View Spaciality</button></a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('save-specialisation') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Specialisation') }}</label>

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

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Add Specialisation') }}
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
