<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
@guest
    @if (Route::has('login'))
        <div class="topnav">
            @auth
                <a href="{{ url('/home') }}" class="social">HOME</a>
            @else
                @if (Route::has('register'))
                    <div class="button-container">
                        <a href="{{ route('register') }}" class="social">REGISTER</a>
                    </div>
                @endif
                <div class="button-container">
                    <a href="{{ route('login') }}" class="social">LOGIN</a>
                </div>
            @endauth
        </div>
    @endif
@else
    <div class="topnav">
        <div class="align-items-left">
            <a href="{{ url('/home') }}">HOME</a>
            <a href="#">MY EVENTS</a>
        </div>
        <div class="dropdown">
            <img src="{{ auth()->user()->profile->profileImage() }}" alt="icon" class="rounded-circle" style="width: 45px; height: 45px; position: relative; top: 6px;">
            <div class="dropdown-content">
                <a href="/profile/{{ auth()->user()->id }}">Profile</a>
                @if(auth()->user()->isOrganizer())
                    <a href="/event/create">Add new event</a>
                @endif
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
        <p class="social">
            Welcome, {{ Auth::user()->username }} <span class="caret"></span>
        </p>
    </div>
@endguest
@yield('content')
</body>
