@extends('layouts.app')

@section('content')


			<div class="container">
				 <h4>{{ __('Login') }}</h4>
              <form method="POST" action="{{ route('login') }}">
                @csrf
					{{-- email --}}
                <div class="mb-4">
                  <label for="email">{{ __('E-Mail Address') }}</label>

                  <div class="p-2 bg-dark">
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
					 {{-- /email --}}
					 {{-- password --}}
                <div class="mb-4 ">
                  <label for="password">{{ __('Password') }}</label>

                  <div class="p-2 bg-danger">
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
					 {{-- /password --}}
					 {{-- remember me--}}
                <div class="mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                      </label>
                    </div>
                </div>
					{{-- /remember me--}}
					{{-- login btn & forgot --}}
                <div class="mb-4 row">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    @endif
                  </div>
                </div>
					 {{-- /login btn & forgot --}}
            </form>
         </div>
@endsection
