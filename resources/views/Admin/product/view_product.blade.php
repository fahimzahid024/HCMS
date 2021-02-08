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
                                <h1 style="color: wheat;">View Product</h1>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('manage-product') }}"><button class="btn btn-success" style="color: wheat;"> Add Product</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-success table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Product Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getData as $item)
                                        <tr>
    
                                            <th scope="row">{{ $item->product_id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->product_des }}</td>
                                            <td><img style="height: 60px; width:60px;"
                                                    src="{{ asset('/images/' . $item->image) }}" alt=""></td>
    
                                            <td>
                                                <a href=""><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete-product',$item->product_id) }}" style="text-decoration:none; font-weight:800; font-size:25px; padding:10px">x</a>
                                            
                                            </td>
    
    
                                        </tr>
    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
