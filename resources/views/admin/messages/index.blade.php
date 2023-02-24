@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">

      <h1>Lista Messaggi Ricevuti</h1>

      @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif

      <table class="table table-striped table-inverse table-responsive">
        <thead>
          <tr>
            <th scope="col">Mittente</th>
            <th scope="col">Titolo</th>
            <th scope="col">Messaggio</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($messages as $message)
            <tr>
              <td>{{ $message->sender_email }}</td>
              <td>{{ $message->title }}</td>
              <td>{{ $message->message_text }}</td>
              <td>
                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-success"><i
                    class="fa-solid fa-eye"></i></a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
@endsection
