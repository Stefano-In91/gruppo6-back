@extends('layouts.app')

@section('content')


          <h3 class="fs-1">Registrazione</h3>

          <div class="container-sm">
            <div class="form__container">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="container-fluid">
                  <div class="row g-4">
                    {{-- nome --}}
                        <div class="col-12 col-lg-6">
                          <label for="name" >Nome</label>
          
                          <div>
                            <input id="name" type="text"
                              class="form-control @error('name') is-invalid @enderror" name="name"
                              value="{{ old('name') }}" required autocomplete="name" autofocus>
          
                            @error('name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        {{-- /nome --}}
                        {{-- cognome --}}
                        <div class="col-12 col-lg-6">
                          <label for="surname">Cognome</label>
          
                          <div>
                            <input id="surname" type="text"
                              class="form-control @error('surname') is-invalid @enderror" name="surname"
                              value="{{ old('surname') }}" required autocomplete="surname" autofocus>
          
                            @error('surname')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        {{-- /cognome --}}
                        {{-- mail --}}
                        <div class="col-12 col-lg-6">
                          <label for="email">Indirizzo
                            Email</label>
          
                          <div>
                            <input id="email" type="email"
                              class="form-control @error('email') is-invalid @enderror" name="email"
                              value="{{ old('email') }}" required autocomplete="email">
          
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        {{-- /mail --}}
                        {{-- password --}}
                        <div class="col-12 col-lg-6">
                          <label for="password">{{ __('Password') }}</label>
          
                          <div>
                            <input id="password" type="password"
                              class="form-control @error('password') is-invalid @enderror" name="password"
                              required autocomplete="new-password">
          
                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        {{-- /password --}}
                        {{-- conferma password --}}
                        <div class="col-12 col-lg-6">
                          <label for="password-confirm">
                            Conferma Password
                          </label>
          
                          <div>
                            <input id="password-confirm" type="password" class="form-control"
                              name="password_confirmation" required autocomplete="new-password">
                          </div>
                        </div>
                        {{-- /conferma password --}}
                        {{-- invio btn --}}
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary btn-lg">
                            Invio
                          </button>
                        </div>
                        {{-- /invio btn --}}
                  </div>
                </div>
                

              </form>
            </div>

          </div>

     
@endsection
