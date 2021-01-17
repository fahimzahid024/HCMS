@extends('layouts.app')

@section('content')
    <section class="header">
        <h1>Health Care Is Our Vission</h1>
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
                            <h5 class="card-title">Category(Medicin)</h5>

                            <a href="{{ route('manage-category') }}" class="btn btn-primary">Manage Category</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Product(Medicin)</h5>

                            <a href="{{ route('manage-product') }}" class="btn btn-primary">Manage Product</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
