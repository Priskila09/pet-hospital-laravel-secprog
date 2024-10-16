@extends('layouts.home')

@section('content')
    <section>
        <div class="container">
            <p class="text-primary text-uppercase mb-0">History</p>
            <h2 class="fw-bold mb-5">Your Order History</h2>
            <div class="card border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Information</th>
                                    <th>Order Information</th>
                                    <th>Total Price</th>
                                    <th>Notes</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $item)
                                    <tr class="align-middle">
                                        <td>#{{ $item->id }}</td>
                                        <td>
                                            <button class="btn btn-light border" type="button" data-bs-toggle="modal"
                                                data-bs-target="#infoCustomer{{ $item->id }}">
                                                Customer Information
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-light border" type="button" data-bs-toggle="modal"
                                                data-bs-target="#infoOrder{{ $item->id }}">
                                                Order Information
                                            </button>
                                        </td>
                                        <td>Rp. {{ number_format($item->total_amount) }}</td>
                                        <td>{{ $item->notes }}</td>
                                        <td>{{ $item->status }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script src="{{ url('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            @foreach ($orders as $item)
                <div class="modal fade" id="infoCustomer{{ $item->id }}" tabindex="-1"
                    aria-labelledby="infoCustomer{{ $item->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="infoCustomer{{ $item->id }}Label">Customer Information
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <td>Name</td>
                                        <td>:</td>
                                        <td>{{ $item->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td>:</td>
                                        <td>{{ $item->user->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td>{{ $item->address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="infoOrder{{ $item->id }}" tabindex="-1"
                    aria-labelledby="infoOrder{{ $item->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="infoOrder{{ $item->id }}Label">Order Information</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->details as $detail)
                                            <tr>
                                                <td>{{ $detail->product->name }}</td>
                                                <td>{{ $detail->quantity }}</td>
                                                <td>Rp. {{ number_format($detail->price) }}</td>
                                                <td>Rp. {{ number_format($detail->price * $detail->quantity) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
<script src="{{ url('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
