@extends('layouts.admin')

@section('content')
  <h1>Inizializzazione Artista</h1>
  @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('admin.artists.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
      <label for="artist_nickname" class="form-label">Nome d'Arte</label>
      <input type="text" class="form-control @error('artist_nickname') alert alert-danger @enderror"
        id="artist_nickname" name="artist_nickname" maxlength="30" required>
    </div>

    <div class="mb-3">
      <label for="introduction_text" class="form-label">Introduzione</label>
      <textarea name="introduction_text" id="introduction_text" cols="30" rows="10"
        class="form-control @error('introduction_text') alert alert-danger @enderror" maxlength="1000"
        required></textarea>
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Indirizzo</label>
      <input type="text" class="form-control @error('address') alert alert-danger @enderror"
        id="address" name="address" maxlength="200" required>
    </div>

    <div class="mb-3">
      <label for="phone_number" class="form-label">Numero di Telefono</label>
      <input type="text" class="form-control @error('phone_number') alert alert-danger @enderror"
        id="phone_number" name="phone_number" maxlength="20" required>
    </div>

    <div class="mb-3">
      <label for="profile_photo" class="form-label">Immagine di Profilo</label>
      <input type="file" class="form-control @error('profile_photo') alert alert-danger @enderror"
        id="profile_photo" name="profile_photo">
    </div>

    <div class="mb-3">
      @foreach ($techniques as $technique)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="{{ $technique->slug }}}"
            name="techniques[]" value="{{ $technique->id }}">
          <label class="form-check-label" for="{{ $technique->slug }}}">{{ $technique->name }}</label>
        </div>
      @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
@endsection
