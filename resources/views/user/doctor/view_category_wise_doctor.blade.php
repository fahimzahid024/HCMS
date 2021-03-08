@extends('layouts.test')
@section('hero')
<!-- ======= Medicin Section ======= -->
<section id="medicin" class="doctors">
    <div class="container" style="margin-top:100px;">

      @php 
        $speciality = DB::table('spacialities')->get(); 
      @endphp
        <div class="section-title">
          <div class="w3-sidebar w3-bar-block w3-white w3-animate-left" style="display:none;z-index:4" id="mySidebar">
            <button class="w3-bar-item w3-button" onclick="w3_close()">X</button>
            @foreach($speciality as $v_speciality)
              <a href="{{ url('/category/'.$v_speciality->id) }}" class="w3-bar-item w3-button">{{ $v_speciality -> name_spaciality }}</a>
            @endforeach
          </div>
          
          <!-- Overlay -->
          
          
          @php 
          $id = DB::table('spacialities')->where('id',$id_id)->first();
          @endphp
          
          <h2>{{ $id -> name_spaciality }}</h2>
            @if (session()->has('message'))
                <div class="alert alert-{{ session('type') }}">
                    {{ session('message') }}
                </div>
            @endif

        </div>
        <div class="row">
            @foreach ($doctor as $item)
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="{{ '/images/' . $item->image }}" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <a href="">
                                <h4>{{ $item->name }}</h4>
                            </a>
                            <p><strong>Email: </strong>{{ $item->doctor_email }}</p>

                            <p><strong>Specialists: </strong>{{ $item->name_spaciality }}</p>
                            <div>
                                <p class="float-left"><strong>Consultency Fee:</strong>{{ $item->consultency_fee }}</p>
                            </div>
                            <div>
                              @if(Session::get('patient_id') != null)
                                <p class="float-right"><a href="{{ url('/patient-booking/'.$item->doctor_id) }}" type="button" class="btn btn-primary">Ticket</a></p>
                              @else
                                <p class="float-right"><a href="{{ route('signin') }}" type="button" class="btn btn-primary">Ticket</a></p>
                              @endif
                              </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        <div class="d-flex align-item-center text-content-center">
          <h5 class="text-center">{{ $doctor  -> links()}}</h5>

      </div>

    </div>
</section><!-- End Doctors Section -->


{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ticket Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form action="{{ route('patient-booking') }}" method="post">
          @csrf
          <div class="form-group">
            <input type="hidden" name="doctor_id" value="{{ $item->doctor_id }}">
            <label for="recipient-name" class="col-form-label">Patient Name:</label>
            <input type="text" class="form-control" name="patient_name" value="" required id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input class="form-control" name="email" value="" id="email" required>
          </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Booking</button>
        </form>
      </div>
      
    </div>
  </div>
</div> --}}
@endsection