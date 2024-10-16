    <div class="row g-4">
        @if ($cart != null)
            <div class="col-lg-8">
                {{-- Cart --}}
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cart->details as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            {{ $item->quantity }}
                                            <div class="d-flex gap-3">
                                                <button
                                                    class="btn btn-sm btn-primary justify-content-center rounded-circle"
                                                    style="width: 34px; height:34px;"
                                                    wire:click="increment({{ $item->id }})"
                                                    @disabled($item->quantity == $item->product->stock)><i class="bx bx-plus"></i></button>
                                                <button
                                                    class="btn btn-sm btn-primary justify-content-center rounded-circle"
                                                    style="width: 34px; height:34px;"
                                                    wire:click="decrement({{ $item->id }})"
                                                    @disabled($item->quantity == 1)><i class="bx bx-minus"></i></button>
                                            </div>

                                        </div>
                                    </td>
                                    <td>Rp. {{ number_format($item->price) }}</td>
                                    <td>Rp. {{ number_format($item->price * $item->quantity) }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" wire:click="destroy({{ $item->id }})"
                                            wire:confirm="Are you sure to delete this product from your cart?">
                                            <i class="bx bx-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                {{-- Button --}}
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Payment Detail</h5>
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                            <p class="mb-0">Subtotal :</p>
                            <p class="mb-0">Rp. {{ number_format($subtotal) }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-4">
                            <p class="mb-0">Shipping Fare :</p>
                            <p class="mb-0">Rp. 10,000</p>
                        </div>
                        <hr class="mb-4">
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-4">
                            <p class="mb-0 fw-bold">Total Payment :</p>
                            <p class="mb-0 fw-bold">Rp. {{ number_format($subtotal + 10000) }}</p>
                        </div>
                        <a href="{{ route('home.cart.confirm') }}"
                            onclick="return confirm('Are your sure with your purchase?')"
                            class = "btn btn-primary fw-semibold justtify-content-center w-100 py-3">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>
        @else
            <p class="text-center">No Products In the Cart Yet!</p>
        @endif

    </div>
