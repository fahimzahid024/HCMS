<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HCMS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Google Fonts -->
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"
        rel="stylesheet">
        <script src="{{ asset('https://kit.fontawesome.com/557e2fff86.js') }}" crossorigin="anonymous"></script>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medilab - v2.1.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="{{ route('/') }}">HCMS</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{ route('/') }}">Home</a></li>
                    @if(Session::get('doctor_name') == null)

                    <li><a href="{{ route('doctor-login') }}">Doctors</a></li>
                        @if(Session::get('patient_id') != null)
                        <li class="drop-down"><a href="">{{ Session::get('patient_name') }}</a>
                            <ul>
                                <li><a href="{{ route('flash') }}">Logout</a></li>
                            </ul>
                        </li>
                        @else
                        <li ><a href="{{ route('signin') }}" class="btn-primary p-2" style="color:white; border-radius:5px;">Login</a></li>
                        <li ><a href="{{ route('signup') }}" class="btn-primary p-2" style="color:white; border-radius:5px;">Signup</a></li>
                        @endif
                    @else  
                    <li class="drop-down"><a href="">{{ Session::get('doctor_name') }}</a>
                        <ul>
                            <li><a href="{{ route('doctor-profile') }}">Profile</a></li>
                            <li><a href="{{ route('flash') }}">Logout</a></li>
                        </ul>
                    </li>
                    @endif

                </ul>
            </nav><!-- .nav-menu -->
            

        </div>
    </header><!-- End Header -->

    @yield('hero')

    <main id="main">

        @yield('home_content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <p>
                            
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <ul>
                            
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <ul>
                            
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>HCMS</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
                    Designed by <a href="https://bootstrapmade.com/">HCMS</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script>
        function w3_open() {
          document.getElementById("mySidebar").style.display = "block";
          document.getElementById("myOverlay").style.display = "block";
        }
        
        function w3_close() {
          document.getElementById("mySidebar").style.display = "none";
          document.getElementById("myOverlay").style.display = "none";
        }
        </script>
</body>

</html>
