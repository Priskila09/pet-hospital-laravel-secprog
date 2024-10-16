@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h2 class="mb-0">Edit Product</h2>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Cancel</a>
    </div>

    <div class="card border-0 mb-5">
        <div class="card-body">
            <form action="{{ route('produk.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row g-3">
                    <div class="col-12">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="price">Normal Price</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}"
                            class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="discount">Discount Price (Optional)</label>
                        <input type="number" name="discount" id="discount" value="{{ $product->discount }}"
                            class="form-control @error('discount') is-invalid @enderror">
                    </div>
                    <div class="col-md-4">
                        <label for="stock">Product Stock</label>
                        <input type="number" name="stock" min="1" id="stock" value="{{ $product->stock }}"
                            class="form-control @error('stock') is-invalid @enderror">
                        @error('stock')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{ $product->description }}</textarea>
                        @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="images">Add Images (Can Add More Than 1)</label>
                        <input type="file" name="images[]" accept="image/*" min="1" id="images"
                            value="{{ old('images') }}" class="form-control @error('images') is-invalid @enderror"
                            multiple>
                        @error('images')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
            </form>
        </div>
    </div>

    <div class="row align-items-center g-2">
        <h5 class="mb-3">Product Images</h5>
        @foreach ($product->images as $item)
            <div class="col-lg-3">
                <form action="{{ route('delete-image-product', $item->id) }}" method="post">
                    @csrf @method('DELETE')

                    <img src="{{ url('storage/' . $item->image) }}" alt="" class="w-100 rounded object-fit-cover"
                        style="height: 200px">
                    <button class="btn btn-light" type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
