@extends('layouts.test')
@section('hero')
<!-- ======= Medicin Section ======= -->
<section id="medicin" class="doctors">
    <div class="container" style="margin-top:100px;">

        <div class="section-title">
            <h2>Cabin</h2>
            @if (session()->has('message'))
                <div class="alert alert-{{ session('type') }}">
                    {{ session('message') }}
                </div>
            @endif

        </div>
        <div class="row">
            @foreach ($cabin as $item)
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="{{ '/images/' . $item->image }}" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <a href="">
                                <h4>Cabin {{ $item->cabin_number }}</h4>
                            </a>
                            <p><strong>Room: </strong>{{ $item->total_room }}</p>

                            <p><strong>Bed: </strong>{{ $item->total_bed }}</p>
                            <p><strong>Floor: </strong>{{ $item->floor }}</p>
                            <p><strong>Price: </strong>{{ $item->price }}</p>
                            <div>
                                <p class="float-left"><strong>Booking Status: </strong>{{ $item->booking_status }}</p>
                            </div>

                            @if( $item->booking_status  != 'Not Booking')
                            @else
                            <div>
                              @if(Session::get('patient_id') != null)
                                <p class="float-right"><a href="{{ url('/cabin-booking/'.$item->id) }}" type="button" class="btn btn-primary">Cabin Booking</a></p>
                              @else 
                              <p class="float-right"><a href="{{ route('signin') }}" type="button" class="btn btn-primary">Cabin Booking</a></p>
                              @endif
                              </div>
                            @endif
                        </div>
                    </div>
                </div>

                
            @endforeach

        </div>
        <div class="d-flex align-item-center text-content-center">
          <h5 class="text-center">{{ $cabin  -> links()}}</h5>

      </div>

    </div>
</section><!-- End Doctors Section -->



@endsection