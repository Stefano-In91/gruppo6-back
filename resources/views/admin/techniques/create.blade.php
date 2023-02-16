@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <h1>Crea una nuova Tecnica</h1>
      <div class="mt-4">
        <form action="{{ route('admin.techniques.store') }}" method="POST">

          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name"
              placeholder="Inserisci il nome della Tecnica">
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10"
              class="form-control @error('description') alert alert-danger @enderror" maxlength="1000"
              placeholder="Inserisci la descrizione della Tecnica" required></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Crea</button>

        </form>
      </div>
    </div>
  </div>
@endsection
