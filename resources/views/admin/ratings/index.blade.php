@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">

      <h1>Lista Valutazioni Ricevute</h1>

      @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif

      <table class="table table-striped table-inverse table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Valutazione</th>
            <th scope="col">Data</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($ratings as $rating)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $rating->rating }}</td>
              <td>{{ $rating->pivot->rating_date }}</td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
@endsection
