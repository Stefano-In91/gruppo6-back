@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">
      <h2>{{ $message->title }}</h2>
      <h4>{{ $message->sender_email }}</h4>
      <p>{{ $message->message_text }}</p>
      <p>{{ $message->date }}</p>
    </div>
    <button href="{{ route('admin.messages.index') }}" class="btn btn-primary">Torna a lista
      Messaggi</button>
  </div>
@endsection
