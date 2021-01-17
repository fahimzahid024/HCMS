@extends('layouts.test')
@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to Health Care Management System</h1>
            <h2>Health Care Is Our Vission</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
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



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Services</h2>

            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" id="img-background">
                    <div class="icon-box">
                        <h4><a href="#doctors">Doctor</a></h4>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" id="img-background2">
                    <div class="icon-box">
                        <div class="icon-box">
                            <a href="#medicin">
                                <h4><a href="#medicin">Medicin</a></h4>
                            </a>
                        </div>

                    </div>
                </div>



            </div>

        </div>
    </section><!-- End Services Section -->


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Doctors</h2>

            </div>

            <div class="row">
                @foreach ($doctorData as $item)
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ '/images/' . $item->image }}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{ $item->name }}</h4>
                                <span>{{ $item->doctor_degree }}</span>
                                <p>{{ $item->duty_time }}</p>
                                <p>{{ $item->doctor_email }}</p>
                                <p>{{ $item->doctor_phone }}</p>
                            </div>
                        </div>
                    </div>

                @endforeach




            </div>

        </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Medicin Section ======= -->
    <section id="medicin" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Medicin</h2>

            </div>
            @php
            $category = DB::table('categories')->orderBy('category_id','DESC')->get();
            @endphp
            <div class="row">
                @foreach ($category as $item)
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ '/images/' . $item->image }}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <a href="{{ route('category-wise-product', $item->category_id) }}">
                                    <h4>{{ $item->name }}</h4>
                                </a>
                                <p>{{ $item->cat_des }}</p>

                                <p></p>
                                <p></p>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

        </div>
    </section><!-- End Doctors Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">



            <div class="container">
                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                        data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                    data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
    </section><!-- End Contact Section -->

@endsection
