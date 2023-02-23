@extends('layouts.admin')

@section('content')
  <div>
    @if (session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    @if (session('message'))
      <div class="alert alert-danger">{{ session('message') }}</div>
      <button href="{{ route('admin.artists.create') }}" class="btn btn-primary">
        Vai a creazione Artista</button>
    @endif

    <h1>Benvenuto {{ $user->name }} {{ $user->surname }}</h1>
    <p>qui fai vedere le statistiche?</p>

  </div>
@endsection
