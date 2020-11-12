<!DOCTYPE html>
<html lang="en">

<head>
    <title>eVidyalays - Simplifying the Education System | Dedicated to Excellence | Home of Quality Schools | Solution
        for Every Institutions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="icon" href="favicon.jpg" type="image/jpg"/>
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img height="30px" src="{{ URL::asset('img\logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                <li class="nav-item cta">
                    @if (Route::has('login'))
                        @auth
                            {{--                            @if (Auth::user()->role == 1)--}}
                            {{--                                <a class="nav-link" href="{{ url('/superadmin') }}"><span>Home</span></a>--}}
                            {{--                            @elseif (Auth::user()->role == 2)--}}
                            {{--                                <a class="nav-link" href="{{ url('/admin') }}"><span>Home</span></a>--}}
                            {{--                            @elseif (Auth::user()->role == 3)--}}
                            {{--                                <a class="nav-link" href="{{ url('/student') }}"><span>Home</span></a>--}}
                            {{--                            @elseif (Auth::user()->role == 4)--}}
                            {{--                                <a class="nav-link" href="{{ url('/teacher') }}"><span>Home</span></a>--}}
                            {{--                            @elseif (Auth::user()->role == 5)--}}
                            {{--                                <a class="nav-link" href="{{ url('/parent') }}"><span>Home</span></a>--}}
                            {{--                            @elseif (Auth::user()->role == 6)--}}
                            {{--                                <a class="nav-link" href="{{ url('/librarian') }}"><span>Home</span></a>--}}
                            {{--                            @elseif (Auth::user()->role == 7)--}}
                            {{--                                <a class="nav-link" href="{{ url('/accountant') }}"><span>Home</span></a>--}}
                            {{--                            @else--}}
                            <a class="nav-link" href="{{ url('/dashboard') }}"><span>Dashboard</span></a>
                            {{--                            @endif--}}
                        @else
                            <a class="nav-link" href="{{ route('login') }}"><span>Login</span></a>
                        @endauth
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
