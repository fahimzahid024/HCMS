@extends('layouts.test')
@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to Health Care Management System</h1>
            <h2>Health Care Is Our Vision</h2>
            <a href="#doctors" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- End Hero -->
@endsection
@section('home_content')
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content">
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch">

                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">

                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">

                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->


    
<!-- End Services Section -->


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Services</h2>

            </div>

            <div class="row">
                
                    
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <a href="{{ route('user-view-cabin') }}"><div class=""><i class="fas fa-users" style="font-size:100px"></i></div></a>
                            <div class="member-info">
                                <h4>Cabin Booking</h4>
                                <span></span>
                                <p> </p>
                                <p> </p>
                                <p> </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <a href="{{ route('view-doctor') }}"><div class=""><i class="fas fa-user-md" style="font-size:100px"></i></div></a>
                           
                            <div class="member-info">
                                <h4>Doctor</h4>
                                <span></span>
                                <p> </p>
                                <p>  </p>
                                <p>    </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <a href="{{ route('home') }}"><div class=""><i class="fas fa-users-cog" style="font-size:100px"></i></div></a>
                            <div class="member-info">
                                <h4>Admin</h4>
                                <span></span>
                                <p> </p>
                                <p>  </p>
                                <p>    </p>
                            </div>
                        </div>
                    </div>


            </div>

        </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Medicin Section ======= -->
    

@endsection
