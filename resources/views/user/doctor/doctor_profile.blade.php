@extends('layouts.test')
@section('hero')
<section id="departments" class="departments">
  <div class="container" style="margin-top:80px;">
    @php 
    $doctor = Session::get('doctor_id');
    $getDoctor = DB::table('doctors')->where('doctor_id', $doctor)->first();
    @endphp
    <div class="section-title">
      <img src="{{ asset('images/'.$getDoctor->image) }}" style="border-radius: 50%;" height="100px" width="100px"alt="">
      <h2>{{ $getDoctor->name }}</h2>
      </div>
      @if (session()->has('message'))
                <div class="alert alert-{{ session('type') }}">
                    {{ session('message') }}
                </div>
            @endif

    <div class="row">
      <div class="col-lg-3">
        <ul class="nav nav-tabs flex-column">
          <li class="nav-item">
            <a class="nav-link active show" data-toggle="tab" href="#tab-1">Your Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-2">View Patient</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-3">Hepatology</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-4">Pediatrics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-5">Eye Care</a>
          </li> --}}
        </ul>
      </div>
      <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>{{ $getDoctor->name }}</h3>
                <p class="font-italic">{{ $getDoctor->doctor_email }}</p>
                <p>{{ $getDoctor->doctor_specilization }}</p>
                <p>{{ $getDoctor->doctor_phone }}</p>
                <p>{{ $getDoctor->consultency_fee }}</p>
                <button class="btn btn-info">Edit Profile</button>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Patient</th>
                      <th scope="col">Patient Email</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  @php 
                  $all_patient = DB::table('ticket_books')->where('doctor_id',Session::get('doctor_id'))->get();
                  @endphp
                  <tbody>
                    @php($i = 1)
                    @foreach($all_patient as $v_patient)
                    
                    <tr>
                      <th scope="row">{{ $i }}</th>
                      <td>{{ $v_patient->name }}</td>
                      <td>{{ $v_patient->email }}</td>
                      <td>
                        <a class="btn btn-danger"href="{{ url('/delete-patient/'.$v_patient->id) }}">Delete</a>
                      </td>
                    </tr>
                    @php($i++)
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          {{-- <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                <p class="font-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                <p class="font-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div> 
          <div class="tab-pane" id="tab-5">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                <p class="font-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>--}}
        </div>
      </div>
    </div>

  </div>
</section><!-- End Departments Section -->
@endsection