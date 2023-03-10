@extends('layouts.app')

@section('content')
<div class="container-sm">

    <div class="form__container">

        <h3 class="mb-4 fs-1">{{ __('Reset Password') }}</h3>

        <div class="container">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row g-5">

                    <div class="col-12">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                    </div>

                    <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
