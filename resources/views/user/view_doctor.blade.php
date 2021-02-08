@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

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
                                <h1 style="color: wheat;" > View Doctor</h1>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('add-doctor') }}"><button class="btn btn-success" style="color: wheat;"> Add Doctor</button></a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-success table-striped">
                                <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Phone</th>
                                      <th scope="col">Doctor Specialization</th>
                                      <th scope="col">Consultency Fee</th>
                                      <th scope="col">Image</th>
                                      <th>action</th>
                                    </tr>
                                  </thead>
                                  @foreach($getData as $item)
                                    <tbody>
                                        <tr>
                                        <th scope="row">{{ $item->doctor_id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->doctor_email }}</td>
                                        <td>{{ $item->doctor_phone }}</td>
                                        <td>{{ $item->doctor_specilization }}</td>
                                        <td>{{ $item->consultency_fee }}</td>
                                        <td><img class="restaurant-img" src="{{ asset('/images/' . $item->image) }}" height="80px" width="80px" alt=""
                                            class="img-fluid"></td>
                                        <td>
                                            <a href=""><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('delete-doctor',$item->doctor_id) }}" style="text-decoration:none; font-weight:800; font-size:25px; padding:10px">x</a>
                                        </td>
                                        </tr>
                                    </tbody>
                                  @endforeach
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection




doctor_phone





