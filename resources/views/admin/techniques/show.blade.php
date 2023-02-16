@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">
      <h1>{{ $technique->name }}</h1>
      <p>{{ $technique->description }}</p>
    </div>
  </div>
@endsection
