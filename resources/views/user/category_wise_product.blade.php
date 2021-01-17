@extends('layouts.test')
@section('home_content')


    <!-- ======= Medicin Section ======= -->
    <section id="medicin" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Products</h2>

            </div>
            @php
            $category = DB::table('products')->get();
            @endphp
            <div class="row">
                @foreach ($category as $item)
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ '/images/' . $item->image }}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <a href="">
                                    <h4>{{ $item->name }}</h4>
                                </a>
                                <p><strong>Price: </strong>{{ $item->price }}</p>
                                <p></p>
                                <p></p>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

        </div>
    </section><!-- End Doctors Section -->

@endsection
