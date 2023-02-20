  @extends('layouts.app')

  @section('content')

  <section>
  {{-- LOGO HEADER ANIMATO --}}

      <div class="d-flex">

        <div class="logo-header d-flex">
            <img src="https://i.pinimg.com/originals/ed/69/f7/ed69f7fa91929ff49ecafac2bfd72360.png" alt="logo">

          {{-- <div class="">
            <img src="https://i.pinimg.com/originals/97/78/bf/9778bf77e0cf65c81da64e0796a4d9cd.jpg" alt="logo">
          </div> --}}

        </div>

  {{-- LOGO HEADER ANIMATO --}}


  {{-- HEADER RIGHT --}}
    <div class="container-fluid bg-light p-5 side-bar-header-right">
        <h1 class="px-2 mt-5">FROM ARTISTS FOR
          <strong class="text-dark">ARTISTS</strong>
        </h1>
        <h4 class="px-2 a-link-primary">
          <a href="#">Scarica Premium gratis per 1 mese</a>
        </h4>
        <p class="fst-italic px-2">  Al termine dell'offerta, solo € 7,99 al mese.
          <br> Annulla quando vuoi.
        </p>
    </div>
      </div>
  {{-- HEADER RIGHT --}}


    {{-- LOGO HEADER ANIMATO --}}

        <div class="header-login d-flex">
          <div>
            <i class="fa-solid fa-bomb"></i>
            <img style="height:100%; object-fit:cover"src="https://www.stickersmurali.com/it/img/asfs360-jpg/folder/products-listado-merchant/adesivi-nike-logo.jpg" alt="">
          </div>
          
          <div class="container-fluid bg-dark p-5">
            <div class="header-login-txt text-white">
            <h3 class="text-white">Sei gia registrato? Loggati ed accedi alla tua
              <strong class="text-warning">dashboard artista!</strong>
            </h3>
              <div class="card-body">

                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="row">
                    <label for="email"
                      class="col-md- col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-">
                      <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-5">
                    <label for="password"
                      class="col-md- col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-">
                      <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="mb-5 row">
                    <div class="col-md-6 offset-md-4">
                      <div class="form-check text-light">

                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                          {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                        </label>

                      </div>
                    </div>
                  </div>
                  </div>

                </form>

              </div>
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-success">
                  {{ __('LOGIN') }}
                </button>
                <button type="submit" class="btn btn-primary">
                  {{ __('REGISTRATI') }}
                </button>
    
                @if (Route::has('password.request'))
                  <a class="btn btn-link text-light" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              </div>
            </div>
          </div>
    
        </div>
        
  </section>

    <section>
      <div class="login-bottom">
      </div>
    </section>



    <h3 class="bg-dark p-5">Perché passare a Premium?</h3>

    <div>
      <div class="container-fluid text-center bg-dark">
        <div class="row align-items-start">

          <div class="boost py-5">
        
                <h1 class="p-2">Ottieni il massimo dal tuo profilo artista!</h1>
                <h3 class="p-2">Ti basta premere su "BOOST".</h3>
          
                <button type="button" class="btn btn-danger">BOOST!</button>
              
            </div>

          </div>

          <div class="discount py-5">
            <h2 class="bg-light p-2">Sconto speciale per studenti idonei iscritti all'università
            </h2>

            <h6 class="bg-dark p-2">2 account Premium per una coppia che vive insieme
            </h6>
              <i class="fa-solid fa-bomb"></i>
            <div>
          </div>


          </div>


          <div class="music py-5">
            <h2 class="bg-light p-2">Scarica musica.</h2>
            <h6 class="bg-dark p-2">Scarica in locale la musica di sottofondo proposta dagli artisti.</h6>
            <i class="fa-solid fa-bomb"></i>

          </div>
        </div>
      </div>
    </div>

    <section>

      <h4 class="bg-dark p-5 plans">PLANS</h4>

      <div>
        <div class="container-fluid text-center bg-dark">
          <div class="row g-2 align-items-start">


            <div class="col-12 col-md-6 col-lg-4">
              <div class="card plans-card">
                <img class="img-card" src="https://pbs.twimg.com/media/FjSMa9oXkAI13-H.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h2 class="card-title">
                  <strong>Standard Artist</strong>
                </h2>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><h4>7.90 euro</h4></li>
                <li class="list-group-item">2 account Premium per una coppia che vive insieme</li>
                <li class="list-group-item">Musica senza pubblicità, riproduzione on demand e in modalità offline</li>
              </ul>
              <div class="card-body">
                <button type="button" class="btn btn-success btn-lg">Start Now</button>
                <button type="button" class="btn btn-secondary btn-lg">Acquista di nuovo</button>
              </div>
            </div>

              </div>

              
            <div class="col-12 col-md-6 col-lg-4  card plans-card">
              <img class="img-card" src="https://pbs.twimg.com/media/FmZf1SWagAAiGNg.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h2 class="card-title">
                  <strong>Premium Artist</strong>
                </h2>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><h4>19.90 euro</h4></li>
                <li class="list-group-item">Sconto speciale per studenti idonei iscritti all'università</li>
                <li class="list-group-item">Ascolta la musica quando e dove vuoi, anche in modalità offline</li>
              </ul>
              <div class="card-body">
                <button type="button" class="btn btn-danger btn-lg">Start Now</button>
                <button type="button" class="btn btn-secondary btn-lg">Login</button>
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 card plans-card">
              <img class="img-card" src="https://pbs.twimg.com/media/FjU2lkcWYAgNG6d.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h2 class="card-title">
                  <strong>Student</strong>
                </h2>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            
              <div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <h4>4.90 euro</h4>
                </li>
                <li class="list-group-item">Sconto speciale per studenti idonei iscritti all'università</li>
                <li class="list-group-item">Musica senza pubblicità, riproduzione on demand e in modalità offline</li>
              </ul>
              </div>
            
              <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg">Start Now</button>
                <button type="button" class="btn btn-secondary btn-lg">Login</button>
              </div>
            </div>


          </div>
        </div>
      </div>

    </section>

      <section>
        <div>
          <h2 class="bg-dark mt-5">DIVISORIO LOGIN FUNZIONANTE</h2>
        </div>
      </section>

  {{-- BOOTSTRAP --}}

    <div>
      <H6 class="mt-5">_________</H6>
    </div>
      <div class="container mt-4">
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                      <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-5 row">
                          <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-6">
                            <input id="email" type="email"
                              class="form-control @error('email') is-invalid @enderror" name="email"
                              value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>

                        <div class="mb-5 row">
                          <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                            <input id="password" type="password"
                              class="form-control @error('password') is-invalid @enderror" name="password"
                              required autocomplete="current-password">

                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>

                        <div class="mb-5 row">
                          <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="mb-5 row">
                          <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success">
                              {{ __('LOG') }}
                            </button>

                            @if (Route::has('password.request'))
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                              </a>
                            @endif
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
      </div>




@endsection
