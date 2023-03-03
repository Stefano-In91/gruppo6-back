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

    <h4 class="mt-1">Nell'ultimo mese hai ricevuto:</h4>

    <h5 class="mt-3">{{ $messages }} Messaggi</h5>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-success">Vai a Messaggi
    </a>

    <h5 class="mt-3">{{ $reviews }} Recensioni</h5>
    <a href="{{ route('admin.reviews.index') }}" class="btn btn-success">Vai a Recensioni
    </a>

    <h5 class="mt-3">{{ $ratings }} Valutazioni</h5>
    <a href="{{ route('admin.ratings.index') }}" class="btn btn-success">Vai a Valutazioni
    </a>

  </div>
@endsection
