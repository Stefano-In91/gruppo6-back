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
        <img src="{{ asset('assets/logowhite.png') }}" alt="logo" class="img-fluid" id="logo">
      </a>
      
      {{-- <div class="navbar-nav">
        <div class="nav-item text-nowrap ms-2">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div> --}}

      <span class="h4 | header-title">
        | Dashboard
      </span>
      <a class="nav-link | ms-auto" href="{{ route('logout') }}"
         onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>

      {{-- hamburger mobile --}}
      <button class="navbar-toggler d-md-none collapsed ms-auto" type="button"
        data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      {{-- /hambugrger mobile --}}
    </header>

    <div class="container-fluid vh-100">
      <div class="row h-100">
        <nav id="sidebarMenu"
          class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">

              <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.dashboard') }}">
                  <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>
                  Dashboard
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.artists.create' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.artists.create') }}">
                  <i class="fa-solid fa-list fa-lg fa-fw"></i>
                  Profilo Artista
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.messages.index' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.messages.index') }}">
                  <i class="fa-solid fa-list fa-lg fa-fw"></i>
                  Lista Messaggi
                </a>
              </li>

          

              {{-- <li class="nav-item"> //Tecnique - Index
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.techniques.index' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.techniques.index') }}">
                  <i class="fa-solid fa-list fa-lg fa-fw"></i>
                  Lista Tecniche
                </a>
              </li> --}}

              {{-- <li class="nav-item"> //Artists - Index
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.artists.index' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.artists.index') }}">
                  <i class="fa-solid fa-list fa-lg fa-fw"></i>
                  Lista Artisti
                </a>
              </li> --}}

            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="p-3">
            @yield('content')
          </div>
        </main>
      </div>
    </div>
  </div>
</body>

</html>
