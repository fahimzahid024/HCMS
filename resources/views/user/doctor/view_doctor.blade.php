@extends('layouts.test')
@section('hero')
<!-- ======= Medicin Section ======= -->
<section id="medicin" class="doctors">
    <div class="container" style="margin-top:100px;">

        <div class="section-title">
            <h2>Doctors</h2>
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

                            <p><strong>Specialists: </strong>{{ $item->doctor_specilization }}</p>
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