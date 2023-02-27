@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">

      <h1>Lista Sponsorizzazioni</h1>

      @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif

      <table class="table table-striped table-inverse table-responsive">
        <thead>
          <tr>
            <th scope="col">Durata Sponsor</th>
            <th scope="col">Costo Sponsor</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($sponsors as $sponsor)
            <tr>
              <td>{{ $sponsor->name }} di Premium</td>
              <td>{{ $sponsor->price }} €</td>
              <td>
                <a href="{{ route('admin.sponsors.show', $sponsor) }}" class="btn btn-success"><i
                    class="fa-solid fa-eye"></i></a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
@endsection
