<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fontawesome 6 cdn -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

  <!-- Usando Vite -->
  @vite(['resources/js/app.js'])
</head>

<body>
  <div id="app">
    <header class="navbar navbar-dark sticky-top flex-md-nowrap shadow px-2" id="ms-header">

      <a class="logo-container" href="/">
        <img src="{{ asset('assets/logowhite.png') }}" alt="logo" class="img-fluid"
          id="logo">
      </a>

      <span class="h4 | header-title">
        | Dashboard
      </span>
      <a class="nav-link | h3 ms-2 ms-md-auto" id="ms-logout" href="{{ route('logout') }}"
        onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>

      {{-- hamburger toggler mobile --}}
      <button class="navbar-toggler d-md-none collapsed ms-auto" type="button"
        data-bs-toggle="collapse" data-bs-target="#ms-sidebar" aria-controls="ms-sidebar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      {{-- /hambugrger toggler mobile --}}
    </header>

    <div class="container-fluid vh-100">
      <div class="row h-100">
        {{-- sidebar --}}
        <nav id="ms-sidebar" class="col-md-3 col-xl-2 d-md-block  sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column text-white">

              <li class="nav-item">
                <a class="nav-link  {{ Route::currentRouteName() == 'admin.dashboard' ? 'ms-bg-secondary' : '' }}"
                  href="{{ route('admin.dashboard') }}">
                  <i class="fa-solid fa-chart-column fa-lg fa-fw"></i>
                  Statistiche
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link  {{ Route::currentRouteName() == 'admin.artists.create' ? 'ms-bg-secondary' : '' }}"
                  href="{{ route('admin.artists.create') }}">
                  <i class="fa-solid fa-user fa-lg fa-fw"></i>
                  Profilo
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link  {{ Route::currentRouteName() == 'admin.messages.index' ? 'ms-bg-secondary' : '' }}"
                  href="{{ route('admin.messages.index') }}">
                  <i class="fa-solid fa-envelope fa-lg fa-fw"></i>
                  Lista Messaggi
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link  {{ Route::currentRouteName() == 'admin.reviews.index' ? 'ms-bg-secondary' : '' }}"
                  href="{{ route('admin.reviews.index') }}">
                  <i class="fa-solid fa-comment-dots fa-lg fa-fw"></i>
                  Lista Recensioni
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link  {{ Route::currentRouteName() == 'admin.ratings.index' ? 'ms-bg-secondary' : '' }}"
                  href="{{ route('admin.ratings.index') }}">
                  <i class="fa-solid fa-star fa-lg fa-fw"></i>
                  Lista Valutazioni
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link  {{ Route::currentRouteName() == 'admin.sponsors.index' ? 'ms-bg-secondary' : '' }}"
                  href="{{ route('admin.sponsors.index') }}">
                  <i class="fa-solid fa-money-bill-trend-up fa-lg fa-fw"></i>
                  Get Sponsored
                </a>
              </li>

              {{-- <li class="nav-item"> //Tecnique - Index
                <a class="nav-link  {{ Route::currentRouteName() == 'admin.techniques.index' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.techniques.index') }}">
                  <i class="fa-solid fa-list fa-lg fa-fw"></i>
                  Lista Tecniche
                </a>
              </li> --}}

              {{-- <li class="nav-item"> //Artists - Index
                <a class="nav-link  {{ Route::currentRouteName() == 'admin.artists.index' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.artists.index') }}">
                  <i class="fa-solid fa-list fa-lg fa-fw"></i>
                  Lista Artisti
                </a>
              </li> --}}

            </ul>
          </div>
        </nav>
        {{-- /sidebar --}}

        <main class="col-md-9 ms-sm-auto col-xl-10 px-md-4">
          <div class="p-3">
            @yield('content')
          </div>
        </main>
      </div>
    </div>
  </div>
</body>

</html>
