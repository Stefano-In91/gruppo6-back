<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>  
    <header>
        <!--custom header-->
        <div class="head">
            <div class="head-logo">
                <!--<img src="./HomePageAssets/logowhite.png" alt="">-->
            </div>
            <div class="head-title">
                | a place where you belong
            </div>
            <div class="head-search" :class="(this.activeSearch==1 ? 'appear':'')">
                <form action=""  @submit.prevent >
                    <input type="text" placeholder="cerca.." id="search-head" >
                </form>
                
            </div>
            <div class="head-nav d-none d-md-block">
                <ul>
                    <li><a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a></li>
                    <li>Esplora</li>
                    <li>Categorie</li>
                    <li>Artisti</li>
                    <li>About us</li>
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
        
        
    <main class="">
        @yield('content')
    </main>
</body>

</html>
