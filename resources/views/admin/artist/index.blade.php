@extends('layouts.admin')

@section('content')
  <?php
  // variabile il rating dell'artista (bisogna fare un parse INT)
  $average_review = 4;
  ?>

  @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
  @endif
  <div class="details">
    <h1>Dettagli Artista</h1>
    <div class="artist">
      {{-- foto profilo --}}
      <div class="artist__avatar">
        @if ($artist->profile_photo)
          <img src="{{ asset("storage/$artist->profile_photo") }}" alt="{{ $artist->artist_nickname }}">
        @else
          <img src="https://via.placeholder.com/100" alt="placeholder">
        @endif
      </div>
      {{-- /foto profilo --}}

      <div class="artist__info">
        <h3>{{ $artist->artist_nickname }}</h3>
        <p>{{ $artist->introduction_text }}</p>

        @if ($artist->techniques->isNotEmpty())
          <h3>Tecniche utilizzate:</h3>
          <ul>
            @foreach ($artist->techniques as $technique)
              <li><a href="{{ route('admin.techniques.show', $technique) }}">{{ $technique->name }}</a>
              </li>
            @endforeach
          </ul>
        @else
          <h3>Nessuna Tecnica Specificata</h3>
        @endif

        <div class="artist__review">
          {{-- stelline  --}}
          <div class="artist__review__stars">
            @for ($i = 0; $i < $average_review; $i++)
              <i class="fa-solid fa-star"></i>
            @endfor
            @for ($i = 0; $i < 5 - $average_review; $i++)
              <i class="fa-regular fa-star"></i>
            @endfor
          </div>
          {{-- /stelline --}}
          <a href="#">Vedi tutte le recensioni</a>
        </div>
      </div>
    </div>
  </div>

  <table class="">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="col">Nome</th>
        <th scope="col" class="col">Introduzione</th>
        <th scope="col" class="col">Indirizzo</th>
        <th scope="col" class="col">Numero di Telefono</th>
        <th scope="col" class="col">Foto Profilo</th>
        <th scope="col" class="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">></th>
        <td>{{ $artist->artist_nickname }}</td>
        <td>{{ $artist->introduction_text }}</td>
        <td>{{ $artist->address }}</td>
        <td>{{ $artist->phone_number }}</td>

        @if ($artist->profile_photo)
          <td>
            <img src="{{ asset("storage/$artist->profile_photo") }}"
              alt="{{ $artist->artist_nickname }}">
          </td>
        @else
          <td>
            <img src="https://via.placeholder.com/100" alt="placeholder">
          </td>
        @endif

        <td>
          <a href="{{ route('admin.artist.edit', $artist) }}"><button
              class="btn btn-secondary">Modifica</button></a>
          <form action="{{ route('admin.artist.destroy', $artist) }}" method="POST"
            class="d-inline">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Elimina</button>

          </form>
        </td>
      </tr>
    </tbody>
  </table>
@endsection
