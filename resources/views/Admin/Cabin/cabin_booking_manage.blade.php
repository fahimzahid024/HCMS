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
                                <h1 style="color: wheat;" >View Cabin</h1>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('manage-cabin') }}"><button class="btn btn-success" style="color: wheat;"> Add Cabin</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th> 
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($cabinBooking as $item)
                                        <tr>
                                            <th>{{ $i }}</th>
                                            <th scope="row">{{ $item->name }}</th>
                                            <th scope="row">{{ $item->email }}</th>
                                            <td scope="row">{{ $item->phone }}</td>
                                            @if ($item->confirm == 'Not Confirmed')
                                                <td scope="row"><button class="btn btn-danger">Not Confirmed</button></td>
                                            @else 
                                                <td scope="row"><button class="btn btn-success">Confirmed</button></td>
                                            @endif
                                            <td>
                                                <a href="{{ url('/delete-booking-cabin/'.$item->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                <a href="{{ url('/confirm-cabin/'.$item->id) }}" class="btn btn-warning btn-xs"><i class="far fa-check-circle"></i></a>
    
                                            </td>
    
    
                                        </tr>
                                        @php($i++)
    
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
