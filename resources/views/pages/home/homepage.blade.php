@extends('layouts.home')

@section('content')
    <header class="main-header"
        style="background-image: url('{{ url('assets2/images/header-bg.jpeg') }}'); background-size: cover; background-position: center;">
        <div class="overlay">
            <div class="container text-center">
                <img src="{{ url('assets2/images/logo.png') }}" width="70" class="d-block mx-auto mb-3" alt="Logo" />
                <h1 class="text-center fw-bold mb-3">Pet Hospital</h1>
                <p class="text-center fs-5 mb-4">
                    We offer various products and
                    <br class="d-none d-lg-block" />
                    services for your dearest pets
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
                <div class="col-12 col-md-6 col-lg-4 d-flex">
                    <div class="card card-service w-100">
                        <div class="card-body p-4 text-center">
                            <i class="bx bx-store fs-1"></i>
                            <h4 class="text-dark fw-semibold mt-2 mb-3">Shop</h4>
                            <p class="text-secondary mb-0">
                                Buy your pets' need anywhere and anytime
                            </p>
                        </div>
                    </div>
                </div>
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



    <section>
        <div class="container">
            <p class="text-center text-primary text-uppercase mb-0">Shop</p>
            <h2 class="text-center fw-bold mb-5">Pet Supplies</h2>

            <div class="row row-cols-2 row-cols-lg-4 g-3">
                @foreach ($products as $item)
                    <div class="col">
                        <a href="{{ route('home.shop.detail', $item->id) }}" class="card card-product">
                            <div class="card-body">
                                <img src="{{ url('storage/' . $item->images->first()->image) }}" alt="Produk 1">
                                <h6 class="text-dark mb-2 mt-3">
                                    {{ $item->name }}
                                </h6>
                                <p class="text-secondary mb-2">
                                    Rp {{ number_format($item->price) }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
