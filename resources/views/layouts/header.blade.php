<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Meyawo landing page.">
    <meta name="author" content="Devcrud">
    <title>FindYourRoommate | Landing Page</title>
    <!-- font icons -->

    <link rel="stylesheet" href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/meyawo.css') }}">
</head>
<style>
    .header1 {
        display: flex;
        align-items: center;
        padding: 0px 20px;
        background-color: transparent; /* خلفية شفافة */
        position: absolute; /* لتثبيت الشعار في أعلى يسار الصفحة */
        top: 0;
        left: 0;
    }
    .header1 .logo {
        max-width: 77px;
        height: auto;
    }


</style>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page Navbar -->
    <nav class="custom-navbar" data-spy="affix" data-offset-top="20">
        <div class="container">
            <header class="header1">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="logo">
                </a>
            </header>

            <!-- Main Navigation Links -->
            <ul class="nav">
                <li class="item">
                    <a class="link" href="{{url('/')}}">Home</a>
                </li>
                <li class="item">
                    <a class="link" href="{{url('/ads')}}">Ads</a>
                </li>

                @auth
                <li class="item ml-md-3">
                    <a href="{{url('/create-ad')}}" class="btn btn-primary">Create New Ad</a>
                </li>
                @endauth
                <li class="item">
                    <ul class="nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('edit-profile') }}">
                                    {{ __('Edit Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                    </ul>
                </li>
            </ul>

            <!-- User Authentication Links -->


            <!-- Hamburger Menu Toggle -->
            <a href="javascript:void(0)" id="nav-toggle" class="hamburger hamburger--elastic">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </a>
        </div>
    </nav><!-- End of Page Navbar -->

    <!-- page content goes here -->
