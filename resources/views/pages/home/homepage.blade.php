@extends('layouts.home')

@section('content')
    <header class="main-header"
        style="background-image: url('{{ url('assets2/images/header-bg.jpeg') }}'); background-size: cover; background-position: center;">
        <div class="overlay">
            <div class="container text-center">
                <img src="{{ url('assets2/images/logo.png') }}" width="70" class="d-block mx-auto mb-3" alt="Logo" />
                <h1 class="text-center fw-bold mb-3">Pet Hospital</h1>
                <p class="text-center fs-5 mb-4">
                    We offer you fast and easy way to
                    <br class="d-none d-lg-block" />
                    schedule your pets appointment to our doctors
                </p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('home.reservation') }}" class="btn btn-primary">
                        <i class="bx bx-calendar"></i> Book Reservation
                    </a>
                </div>
            </div>
        </div>
    </header>



    <section class="bg-light">
        <div class="container">
            <p class="text-center text-primary text-uppercase mb-0">Our Services</p>
            <h2 class="text-center fw-bold mb-5">What We Offer</h2>

            <div class="row justify-content-center g-3">
                {{-- <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card card-service w-100">
                        <div class="card-body p-4 text-center">
                            <i class="bx bx-cut fs-1"></i>
                            <h4 class="text-dark fw-semibold mt-2 mb-3">Grooming</h4>
                            <p class="text-secondary mb-0">
                                Pet care
                            </p>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card card-service w-100">
                        <div class="card-body p-4 text-center">
                            <i class="bx bx-plus-medical fs-1"></i>
                            <h4 class="text-dark fw-semibold mt-2 mb-3">Pet Clinic</h4>
                            <p class="text-secondary mb-0">
                                Consult about your pet health
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
