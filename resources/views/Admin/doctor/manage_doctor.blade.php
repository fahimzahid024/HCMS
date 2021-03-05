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
                            <h1 style="color: wheat;"> Add Doctor</h1>
                        </div>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Doctor Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getData as $item)
                                    <tr>

                                        <th scope="row">{{ $item->doctor_id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->doctor_email }}</td>
                                        <td><img style="height: 60px; width:60px;"
                                                src="{{ asset('/images/' . $item->image) }}" alt=""></td>

                                        <td>
                                            <a href="{{ url('/delete-doctor/'.$item->doctor_id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            <a href="" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>

                                        </td>


                                    </tr>

                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
