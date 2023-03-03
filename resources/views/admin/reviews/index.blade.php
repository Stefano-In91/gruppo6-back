@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">

      <h1>Lista Recensioni Ricevute</h1>

      @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif

      <table class="table table-striped table-inverse table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo Recensione</th>
            <th scope="col">Testo</th>
            <th scope="col">Data</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($reviews as $review)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $review->title }}</td>
              <td>{{ $review->review_text }}</td>
              <td>{{ $review->date }}</td>
              <td>
                <a href="{{ route('admin.reviews.show', $review) }}" class="btn btn-success"><i
                    class="fa-solid fa-eye"></i></a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
@endsection
