@extends('layouts.home')

@section('content')
    <section>
        <div class="container">
            <p class="text-primary text-uppercase mb-0">Order Confirmation</p>
            <h2 class="fw-bold mb-5">Your Order</h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h4 class="mb-3">
                Product
            </h4>
            <div class="table-responsive mb-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                        @endphp

                        @foreach ($cart->details as $item)
                            @php
                                $subtotal += $item->quantity * $item->price;
                            @endphp
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    {{ $item->quantity }}



                                </td>
                                <td>Rp. {{ number_format($item->price) }}</td>
                                <td>Rp. {{ number_format($item->price * $item->quantity) }}</td>

                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="3">Shipping Fare</th>
                            <th>Rp. 10.000</th>
                        </tr>
                        <tr>
                            <th colspan="3">Total</th>
                            <th>Rp. {{ number_format($subtotal) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="mb-3">
                Personal Information
            </h4>
            <form action="{{ route('home.cart.confirm.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="total" value="{{ $subtotal + 10000 }}">
                <div class="row g-3">
                    <div class="col-lg-6"><label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="col-lg-6"><label for="name" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" id="name" class="form-control"
                            value="{{ Auth::user()->phone_number }}" required>
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Adress</label>
                        <textarea name = "address" id="address" class="form-control" required>{{ Auth::user()->address }}</textarea>
                    </div>
                    <div class="col-12">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea name = "notes" id="notes" class="form-control"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="">Transfer to</label>
                        <div class="d-flex gap-3">
                            <div>
                                <img src="{{ asset('assets2/images/bca.jpg') }}" alt="" width="150">
                                <h5 class="mt-2">1234567890</h5>
                                <p>A.N Pet Hospital</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <label for="proof_payment">Proof of Payment</label>
                        <input type="file" id="proof_payment" name="proof_payment" class = "form-control" required />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-4">Confirm and Pay</button>
                    </div>
                </div>


            </form>
        </div>
    </section>
@endsection
