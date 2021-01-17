<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hospital | Management</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css') }}"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="{{ asset('https://kit.fontawesome.com/557e2fff86.js') }}" crossorigin="anonymous"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="{{ asset('https://fonts.gstatic.com') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div id="main" style="color: black;">
                    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                </div>
                <a class="navbar-brand text-bold" href="{{ url('/') }}">
                    HCMS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">

                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a style="margin: 9px;" href="{{ url('/') }}">Dashboard</a>
            <button id="sidebar-dropdown" class="dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
            <div style="background-color: black;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a id="dropdown-anchor" href="">Add Doctor</a>
                <a id="dropdown-anchor" href="">Manage
                    Doctor</a>
            </div>
        </div>




        <section class="header">
            <h1>Health Care Is Our Vission</h1>
        </section>
        <div class="container">

            <section class="doctor">
                <div class="container py-5 text-center">
                    <h1 class="pt-5">Our Doctor</h1>
                    <hr>
                    <div class="row">
                        @foreach ($getData as $item)
                            <div class="col-lg-3">
                                <div class="card py-3 mb-3">
                                    <div class="card-head">
                                        <p class="font-weight-bold">{{ $item->doctor_name }} <br> <small>Ban
                                                Dhaka</small></p>
                                        <img src="{{ asset('/images/' . $item->image) }}" class="img-fluid" alt="">
                                        <p class="pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus,
                                            minima!
                                        </p>
                                        <span><i class="fab fa-facebook pr-3"
                                                style="color: rgb(38, 96, 255); font-size: 20px;"></i></span>
                                        <span><i class="fab fa-twitter"
                                                style="color: rgb(68, 151, 230); font-size: 20px;"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }

    </script>
</body>

</html>
