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
                                <h1 style="color: wheat;" > Add Product</h1>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('view-product') }}"><button class="btn btn-success" style="color: wheat;"> View Category</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('save-product') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

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
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>
                                    @php
                                    $category = DB::table('categories')->get();
                                    @endphp
                                    <div class="col-md-6">
                                        <select class="form-control" name="cat_id" id="category">
                                            <option value="">Select Category</option>
                                            @foreach ($category_data as $cat_item)
                                                <option value="{{ $cat_item->category_id }}">
                                                    {{ ucwords($cat_item->name) }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="product_des"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea name="product_des" id="product_des" cols="40" rows="3"></textarea>

                                        @error('product_des')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="image"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>

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


                                <div class="form-group row">
                                    <label for="tablet_price"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Tablet Price') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('tablet_price') is-invalid @enderror"
                                            name="tablet_price" value="{{ old('tablet_price') }}" required
                                            autocomplete="tablet_price" autofocus>

                                        @error('tablet_price')
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
