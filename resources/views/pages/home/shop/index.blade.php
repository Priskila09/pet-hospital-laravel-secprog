@extends('layouts.home')

@section('content')
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
