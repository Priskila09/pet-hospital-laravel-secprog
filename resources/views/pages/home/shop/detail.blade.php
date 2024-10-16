@extends('layouts.home')

@section('content')
    <section>
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 g-4">
                <div class="col">
                    <img id="mainImage" src="{{ url('storage/' . $product->images->first()->image) }}" alt=""
                        class="rounded">
                    <div class="row align-items-center row-cols-5 g-3">
                        @foreach ($product->images as $item)
                            <div class="col">
                                <img class="smallImage" src="{{ url('storage/' . $item->image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col">
                    <h2>{{ $product->name }}</h2>
                    @if ($product->discount > 0)
                        <del class="text-danger">Rp. {{ number_format($product->price) }}</del>
                        <h5>Rp. {{ number_format($product->discount) }}</h5>
                    @else
                        <h5>Rp. {{ number_format($product->price) }}</h5>
                    @endif
                    @if ($product->stock == 0)
                        <p class="text-danger">Product is Empty</p>
                    @else
                        <p class="text-success">In Stock: {{ $product->stock }}</p>
                    @endif
                    <p class="text-secondary mb-5">{{ $product->description }}</p>
                    <livewire:add-to-cart :$product />
                    {{-- <form action="{{ route('home.add-to-cart', $product->id) }}" method="post">
                        @csrf
                        <div class="d-flex align-items-center gap-2">
                            <input type="number" value="1" class="form-control py-3 w-25">
                            <button type="submit" class="btn btn-primary py-3">
                                <i class="bx bx-cart"></i> Add to Cart
                            </button>
                        </div>

                    </form> --}}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('addon-script')
    <script>
        const mainImage = document.getElementById('mainImage');

        // Ambil semua elemen gambar kecil
        const smallImages = document.querySelectorAll('.smallImage');

        // Tambahkan event listener ke setiap gambar kecil
        smallImages.forEach(image => {
            image.addEventListener('click', function() {
                // Ganti src gambar besar dengan src gambar kecil yang diklik
                mainImage.src = this.src;
            });
        });
    </script>
@endpush
