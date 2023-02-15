@extends('layouts.admin')

@section('content')
  <h1>Dettagli Artista</h1>
  @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
  @endif
  <table>
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
          <img src="{{asset("storage/$artist->profile_photo")}}" alt="{{$artist->artist_nickname}}">
        </td>
        @else
        <td>
          <img src="https://via.placeholder.com/100" alt="placeholder">
        </td>
        @endif
        
        <td>
          <a href="{{ route('admin.artist.edit', $artist) }}"><button
              class="btn btn-secondary">Modifica</button></a>
          <form action="{{ route('admin.artist.destroy', $artist) }}" method="POST" class="d-inline">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Elimina</button>

          </form>
        </td>
      </tr>
    </tbody>
  </table>
@endsection
