@extends('layouts.admin')

@section('content')
@if (session('message'))
  <div class="alert alert-success">{{ session('message') }}</div>
@endif
<h1>Lista Messaggi Ricevuti</h1>
  <div class="container-fluid">




      <table class="table table-striped table-inverse table-responsive d-none">
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

  <div class="row">
    @foreach ($messages as $message)
        <div class="col-12 col-lg-6 col-xxl-3">
           {{-- card message --}}
            <div class="card mt-4">
                <div class="card-header">
                  <h4 class="card-title">{{$message->title}}</h4>
                  <h6 class="card-subtitle mb-2 text-muted">mittente: {{$message->sender_email}}</h6>
                  <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-success">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                </div>
                <div class="card-body">
                  <p class="card-text">{{ $message->message_text }}</p> 	
                </div>
            </div>
            {{-- /card message --}}
        </div>
    @endforeach
  </div>    
    
  </div>
@endsection
