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
                                        <th scope="col">Room Number</th>
                                        <th scope="col">Room Quantity</th> 
                                        <th scope="col">Floor</th>
                                        <th scope="col">Room Image</th>
                                        <th scope="col">Bed</th>
                                        <th scope="col">Wash Room</th>
                                        <th scope="col">Booking Status</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($cabin as $item)
                                        <tr>
                                            <th>{{ $i }}</th>
                                            <th scope="row">{{ $item->cabin_number }}</th>
                                            <th scope="row">{{ $item->total_room }}</th>
                                            <td>{{ $item->floor }}</td>
                                            <td><img src="{{ asset('/images/'. $item->image) }}" height="80px" width="80px" alt=""></td>
                                            <td>{{ $item->total_bed }}</td>
                                            <td>{{ $item->total_bathroom }}</td>
                                            <td>{{ $item->booking_status }}</td>
                                            <td>
                                                <a href="{{ url('/delete-cabin/'.$item->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                <a href="{{ url('/edit-cabin/'.$item->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
    
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
