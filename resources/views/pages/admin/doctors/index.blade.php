@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h2 class="mb-0">List Doctors</h2>
        <a href="{{ route('dokter.create') }}" class="btn btn-primaryphp">Create New Doctors</a>
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
                            <th>Doctor Name</th>
                            <th>Specialist</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($doctors as $item)
                            <tr>
                                <td>{{ $loop->iteration + $doctors->perPage() * ($doctors->currentPage() - 1) }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->specialist }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('dokter.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('dokter.destroy', $item->id) }}" method="post">
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
            {{ $doctors->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
