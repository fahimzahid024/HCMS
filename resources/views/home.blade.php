@extends('layouts.app')

@section('content')
    <section class="header">
        <h1>Health Care Is Our Vision</h1>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Doctor</h5>

                            <a href="{{ route('add-doctor') }}" class="btn btn-primary">Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cabin</h5>

                            <a href="{{ route('manage-cabin') }}" class="btn btn-primary">Manage Cabin</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cabin Booking List</h5>

                            <a href="{{ route('manage-cabin-booking') }}" class="btn btn-primary">Manage Cabin Booking</a>
                        </div>
                    </div>
                </div>
                
            </div>


        </div>
    </section>
@endsection
