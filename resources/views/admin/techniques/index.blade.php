@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">

      <h1>Lista Tecniche Disponibili</h1>

      @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif

      <table class="table table-striped table-inverse table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Slug</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($techniques as $technique)
            <tr>
              <td>{{ $technique->id }}</td>
              <td>{{ $technique->name }}</td>
              <td>{{ $technique->description }}</td>
              <td>{{ $technique->slug }}</td>
              <td>
                <a href="{{ route('admin.techniques.show', $technique) }}" class="btn btn-success"><i
                    class="fa-solid fa-eye"></i></a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
@endsection
