@extends('layouts.admin')

@section('content')
  <div class="container d-none">
    <div class="py-4">
      <h2>{{ $message->title }}</h2>
      <h4>{{ $message->sender_email }}</h4>
      <p>{{ $message->message_text }}</p>
      <p>{{ $message->date }}</p>
    </div>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Torna a lista
      Messaggi</a>
  </div>
  {{-- card message --}}
  <div>

  </div>
  {{-- /card message --}}
  <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">
    Torna a lista Messaggi
  </a>
@endsection
