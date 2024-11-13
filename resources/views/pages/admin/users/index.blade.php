@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h2 class="mb-0">List Users</h2>
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
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration + $users->perPage() * ($users->currentPage() - 1) }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ ucfirst($item->roles) }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-warning">Edit
                                            Role</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
