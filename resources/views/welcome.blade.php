


@extends('layouts.app')



@section('content')


        <div class="jumbotron p-5 mb-4 rounded-3">
            <div class="container py-5">
                <div class="logo-welcome">
                    <div class="container text-center">
                        <div class="row justify-content-evenly d-flex align-items-center">
                        {{-- <div class="col">
                            <img src="https://i.pinimg.com/originals/ed/69/f7/ed69f7fa91929ff49ecafac2bfd72360.png" class="img-fluid" alt="...">
                        </div> --}}
                        <div class="col">
                            <h1> <strong>Scan the QR Code:</strong></h1>
                            <img src="https://i.postimg.cc/W1sVZ4t6/220px-Qr-1-svg-Recuperato.png" alt="">
                        </div>
                        
                        </div>
                    </div>
                </div>
                <h2 class="display-5 fw-bold">
                    Download our App!
                </h2>

                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                <button class="btn btn-success btn-lg" type="button">DOWNLOAD NOW</button>
            </div>
        </div>

        <div class="content">
            {{-- <div class="container">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
            </div> --}}
        </div>

        <section>
            <footer class="ftr">
                <div class="">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-4">
                            <ul class="text-light">
                                <li>PLANS</li>
                                <li>FAQ</li>
                                <li>CONTACTS</li>
                                <li>WORK WITH US</li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="text-light">
                                <li>Assistenza</li>
                                <li>Chat with us</li>
                                <li>Partnership</li>
                                
                            </ul>
                        </div>
                        <div class="col-4">

                            <img class="w-50" src="https://i.pinimg.com/originals/ed/69/f7/ed69f7fa91929ff49ecafac2bfd72360.png" class="img-fluid" alt="...">

                        </div>
                        
                    </div>
                </div>
            </footer>
        </section>




@endsection
