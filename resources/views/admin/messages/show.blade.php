@extends('layouts.admin')

@section('content')
  {{-- <div class="container d-none">
    <div class="py-4">
      <h2>{{ $message->title }}</h2 2>
      <h4>{{ $message->se}}</h4>
      <p>{{ $message->message_text }}</p>
      <p>{{ $message->date }}</p>
    </div>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Torna a lista
      Messaggi</a>
  </div> --}}
  <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">
    Torna a lista Messaggi
  </a>
  {{-- card message --}}
  <div class="card mt-4">
    <div class="card-header">
      <h5 class="card-title">{{$message->title}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">mittente: {{$message->sender_email}}</h6>
    </div>
    <div class="card-body">
      <p class="card-text">{{ $message->message_text }}</p>
    </div>
  </div>
  {{-- /card message --}}
  
@endsection
