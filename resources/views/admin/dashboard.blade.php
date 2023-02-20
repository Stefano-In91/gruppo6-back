@extends('layouts.admin')

@section('content')
  <div >
    @if (session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    
    <h1>Benvenuto {{ $user->name }} {{ $user->surname }}</h1>
    
    <p>qui fai vedere le statistiche?</p>

  </div>
@endsection
