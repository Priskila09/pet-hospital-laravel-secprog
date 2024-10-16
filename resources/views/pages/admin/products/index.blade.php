@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h2 class="mb-0">Product</h2>
        <a href="{{ route('produk.create') }}" class="btn btn-primary">Add New Product</a>
    </div>

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
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $loop->iteration + $products->perPage() * ($products->currentPage() - 1) }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        @foreach ($item->images as $image)
                                            <img src="{{ url('storage/' . $image->image) }}"
                                                class="object-fit-cover rounded-3" style="width: 40px; height: 40px"
                                                alt="">
                                        @endforeach
                                    </div>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if ($item->discount > 0)
                                        <del class="text-danger">Rp. {{ number_format($item->price) }}</del>
                                        <p>Rp. {{ number_format($item->discount) }}</p>
                                    @else
                                        <p>Rp. {{ number_format($item->price) }}</p>
                                    @endif
                                </td>
                                <td>{{ $item->stock }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('produk.destroy', $item->id) }}" method="post">
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
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
