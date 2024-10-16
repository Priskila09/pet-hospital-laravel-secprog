@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">Reservation</h2>

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
                            <th>Customer Name</th>
                            <th>Reservation Date</th>
                            <th>Time</th>
                            <th>Doctor</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reservations as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->date_of_reservation }}</td>
                                <td>{{ $item->time_of_reservation }}</td>
                                <td>{{ $item->doctor->name }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <form action="{{ route('reservasi.update', $item->id) }}" method="post">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="Done">
                                            <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                        </form>
                                        <form action="{{ route('reservasi.destroy', $item->id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-light btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $products->links('pagination::bootstrap-5') }} --}}
        </div>
    </div>
@endsection
