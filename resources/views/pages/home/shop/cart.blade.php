@extends('layouts.home')

@section('content')
    <section>
        <div class="container">
            <p class="text-primary text-uppercase mb-0">Cart</p>
            <h2 class="fw-bold mb-5">Your Shopping Cart</h2>

            <livewire:cart :$cart />
        </div>
    </section>
@endsection
