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
                                <h1 style="color: wheat;" > Add Cabin</h1>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('view-cabin') }}"><button class="btn btn-success" style="color: wheat;"> View Cabin</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('save-cabin') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="cabin_number"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Cabin Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="cabin_number" type="text"
                                            class="form-control @error('cabin_number') is-invalid @enderror" name="cabin_number"
                                            value="{{ old('cabin_number') }}" required autocomplete="cabin_number" autofocus>

                                        @error('cabin_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cabin_room"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Bed Room') }}</label>

                                    <div class="col-md-6">
                                        <input id="cabin_room" type="text"
                                            class="form-control @error('cabin_room') is-invalid @enderror" name="cabin_room"
                                            value="{{ old('cabin_number') }}" required autocomplete="cabin_room" autofocus>

                                        @error('cabin_room')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="floor"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Floor') }}</label>

                                    <div class="col-md-6">
                                        <input id="floor" type="text"
                                            class="form-control @error('floor') is-invalid @enderror" name="floor"
                                            value="{{ old('cabin_number') }}" required autocomplete="floor" autofocus>

                                        @error('floor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bathroom"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Wash Room') }}</label>

                                    <div class="col-md-6">
                                        <input id="bathroom" type="text"
                                            class="form-control @error('bathroom') is-invalid @enderror" name="bathroom"
                                            value="{{ old('bathroom') }}" required autocomplete="bathroom" autofocus>

                                        @error('bathroom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="total_bed"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Total Bed') }}</label>

                                    <div class="col-md-6">
                                        <input id="total_bed" type="text"
                                            class="form-control @error('total_bed') is-invalid @enderror" name="total_bed"
                                            value="{{ old('total_bed') }}" required autocomplete="total_bed" autofocus>

                                        @error('total_bed')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Booking Price') }}</label>

                                    <div class="col-md-6">
                                        <input id="cabin_number" type="text"
                                            class="form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{ old('price') }}" required autocomplete="price" autofocus>

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file"
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                            value="{{ old('image') }}" required autocomplete="image" autofocus>

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
                                            {{ __('Add Cabin') }}
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
