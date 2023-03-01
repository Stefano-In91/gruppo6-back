@extends('layouts.app')

@section('content')

			<div class="container-sm">
				<div class="form__container form__container--login">
					<h3 class="mb-4 fs-1">{{ __('Login') }}</h3>
					 <form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="container">
							<div class="row g-5">
								{{-- email --}}
								 <div class="col-12 col-md-6">
									<label for="email">{{ __('E-Mail Address') }}</label>
			
									<div class="p-2">
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
								 <div class="col-12 col-md-6 ">
									<label for="password">{{ __('Password') }}</label>
			
									<div class="p-2">
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
								 <div class="col-12 col-md-6">
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
								 <div class="col-12">
									
									  <button type="submit" class="btn btn-primary">
										 {{ __('Login') }}
									  </button>
			
									  @if (Route::has('password.request'))
										 <a class="btn btn-link" href="{{ route('password.request') }}">
											{{ __('Forgot Your Password?') }}
										 </a>
									  @endif
									
								 </div>
								 {{-- /login btn & forgot --}}
							</div>
						</div>
				  </form>
				</div>
         </div>
@endsection
