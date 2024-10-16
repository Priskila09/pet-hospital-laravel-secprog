@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h2 class="mb-0">Add New Product</h2>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Cancel</a>
    </div>

    <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price">Normal Price</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}"
                class="form-control @error('price') is-invalid @enderror">
            @error('price')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="discount">Discount Price (Optional)</label>
            <input type="number" name="discount" id="discount" value="{{ old('discount') }}"
                class="form-control @error('discount') is-invalid @enderror">
        </div>
        <div class="mb-3">
            <label for="stock">Product Stock</label>
            <input type="number" name="stock" min="1" id="stock" value="{{ old('stock') }}"
                class="form-control @error('stock') is-invalid @enderror">
            @error('stock')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
            @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="images">Upload Images (Can Add More Than 1)</label>
            <input type="file" name="images[]" accept="image/*" min="1" id="images"
                value="{{ old('images') }}" class="form-control @error('images') is-invalid @enderror" multiple>
            @error('images')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save New</button>
    </form>
@endsection
