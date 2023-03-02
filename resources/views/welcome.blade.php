@extends('layouts.app')
@section('content')
<section class="welcome">
    
    <div class="container">
        <div class="text-intro">
            <h1 class="mt-3 text-center">Art_Hub</h1>
            <p>Welcome to our platform, designed by artists for artists, where we empower the creative community through innovative tools, resources, and collaboration opportunities. Join us and unleash your full artistic potential!</p>
        </div>
        <div class="row g-3">
            <div class="col-12 col-lg-6 ">
                <a href="http://localhost:8000/login" class="py-4 rounded-4 btn btn-primary btn-lg btn-block w-100">
                    Login
                </a>
            </div>
            <div class="col-12 col-lg-6 ">
                <a href="http://localhost:8000/register" class="py-4 rounded-4 btn btn-outline-secondary btn-lg btn-block w-100">
                    Register
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
