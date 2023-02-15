@extends('layouts.admin')

@section('content')
  @if ($artist)
    <h1>Dettagli Artista</h1>
    @if (session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <a href="{{ route('admin.artist.create') }}"><button
        class="btn btn-primary my-3">Aggiungi</button></a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="col-9">Titolo</th>
          <th scope="col" class="col-3">Azioni</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">{{ $artist->id }}</th>
          <td>{{ $artist->title }}</td>
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
  @endif
@endsection
