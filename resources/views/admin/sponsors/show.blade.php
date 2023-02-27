@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">
      <h2>{{ $sponsor->name }}</h2>
      <p>{{ $sponsor->price }}</p>
    </div>
    <a {{-- href="{{ route('admin.sponsors.index') }}" --}} class="btn btn-primary">Compra sponsorizzazione</a>
    <a href="{{ route('admin.sponsors.index') }}" class="btn btn-primary">Torna a lista
      Messaggi</a>
  </div>
@endsection
