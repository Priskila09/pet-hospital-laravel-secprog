<div>
    <form wire:submit="save">
        <div class="d-flex align-items-center gap-2">
            <input type="number" wire:model="qty" min="1" max="{{ $product->stock }}" class="form-control py-3 w-25">
            <button type="submit" class="btn btn-primary py-3">
                <i class="bx bx-cart"></i> Add to Cart
            </button>
        </div>
    </form>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('status') }} <a href="{{ route('home.cart') }}">Show Cart</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
