@extends('layouts.admin')

@section('content')
  <div class="container">
    @if (session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <h1>Welcome {{ $user->name }} {{ $user->surname }}</h1>

    {{-- <h3>Il tuo nick da artista è {{ $user->artist->artist_nickname }}</h3> --}}

  </div>
@endsection
