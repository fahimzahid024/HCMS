@extends('layouts.test')
@section('hero')
<!-- ======= Medicin Section ======= -->
<section id="medicin" class="doctors">
    <div class="container" style="margin-top:100px;">

        <div class="section-title">
            <h2>Cabin</h2>
            @if (Session('success'))
                <div class="alert bg-success">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    {{ Session('success') }}
                </div>
            @endif
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
                            <p>
                                @php
                                    $rating = DB::table('ratings')->where('cabin_id',$item->id)->sum('rating');
                                    $rating_count = DB::table('ratings')->where('cabin_id',$item->id)->count('rating');
                                    $avg = $rating/$rating_count;
                                @endphp
                                @for($i = 0; $i<5; $i++)
                                    @if($avg > 0)
                                    <i class="fa fa-star" style="color:#FFC300;"></i>
                                    @else    
                                        <i class="fa fa-star" color="color:black;"></i>
                                    @endif
                                    @php($avg--)
                                @endfor
                            </p>
                            <div>
                                <p class="float-left"><strong>Booking Status: </strong>{{ $item->booking_status }}</p>
                            </div>

                            @if( $item->booking_status  != 'Not Booking')
                            @else
                            <div>
                              @if(Session::get('patient_id') != null)
                                <p class="float-right"><a href="{{ url('/cabin-booking/'.$item->id) }}" type="button" class="btn btn-primary">Cabin Booking</a>
                                    <p class="float-left mr-3"><a href="{{ url('/give-rating/'.$item->id) }}" type="button" class="btn btn-primary">Rating</a>
                                {{-- <button type="button" class="btn btn-primary pt-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Rating</button> --}}
                            </p>
                                @else 
                              <p class="float-right"><a href="{{ route('signin') }}" type="button" class="btn btn-primary">Cabin Booking</a></p>
                              @endif
                              </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- rating modal --}}

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rating</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ url('/add-rating/'.$item->id) }}">
                                @csrf
                            <div class="form-group">
                                <select class="custom-select custom-select-lg mb-3" name="rating" required>
                                    <option selected>Select Rating</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option value="4">Five</option>
                                  </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Rating</button>
                            </div>
                            </form>
                        </div>
                        
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