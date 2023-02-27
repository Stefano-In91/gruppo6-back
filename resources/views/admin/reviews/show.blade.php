@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">
      <h2>{{ $review->title }}</h2>
      <p>{{ $review->review_text }}</p>
      <p>{{ $review->date }}</p>
    </div>
    <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary">Torna a lista
      Recensioni</a>
  </div>
@endsection
