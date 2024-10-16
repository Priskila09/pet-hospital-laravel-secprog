@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">Order</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                            <th>Proof Of Payment</th>
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
                                <td>
                                    @if ($item->proof_payment)
                                        <img src="{{ asset('storage/' . $item->proof_payment) }}" alt="Proof of Payment"
                                            class="img-fluid" style="max-width: 100px;">
                                    @else
                                        No proof provided
                                    @endif
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Change Status
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form action="{{ route('orders.update', $item->id) }}" method="post">
                                                        @csrf @method('PUT')
                                                        <input type="hidden" name="status" value="Diproses">
                                                        <button class="dropdown-item" type="submit">
                                                            Diproses
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('orders.update', $item->id) }}" method="post">
                                                        @csrf @method('PUT')
                                                        <input type="hidden" name="status" value="Dikirim">
                                                        <button class="dropdown-item" type="submit">
                                                            Dikirim
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('orders.update', $item->id) }}" method="post">
                                                        @csrf @method('PUT')
                                                        <input type="hidden" name="status" value="Selesai">
                                                        <button class="dropdown-item" type="submit">
                                                            Selesai
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('orders.update', $item->id) }}" method="post">
                                                        @csrf @method('PUT')
                                                        <input type="hidden" name="status" value="Gagal">
                                                        <button class="dropdown-item" type="submit">
                                                            Gagal
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <form action="{{ route('orders.destroy', $item->id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-light">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- 
    <script src="{{ url('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    @foreach ($orders as $item)
        <div class="modal fade" id="infoCustomer{{ $item->id }}" tabindex="-1"
            aria-labelledby="infoCustomer{{ $item->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="infoCustomer{{ $item->id }}Label">Customer Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
@endsection
