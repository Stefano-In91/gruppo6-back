<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
        
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>  
    <header>
        <!--custom header-->
        <div class="head">
            <a href="http://localhost:5174/" class="head-logo">
               <img src="{{asset('assets/logowhite.png')}}" alt="logo">
            </a>
            <div class="head-title">
                | a place where you belong
            </div>
            <div class="head-nav d-none d-md-block">
                <ul>
                    <li><a class="nav-link" href="http://localhost:5174/">{{ __('Home') }}</a></li>
                    @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                    @else
                    <li>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <!--<div class="hamburger-menu d-md-none">
                <i class="fa-solid fa-bars"></i>
            </div>-->
        </div>
        @endguest
    </header>
        
        
    <main>
        @yield('content')
    </main>
</body>

</html>
