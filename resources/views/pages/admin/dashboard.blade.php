@extends('layouts.admin')

@section('content')
    <h2 class="text-dark fw-semibold mb-5">Welcome Back, {{ Auth::user()->name }} 👋</h2>
    <div class="row g-3 mb-5">

        <div class="col-6 col-lg-3">
            <div class="card border-0 rounded-3">
                <div class="card-body p-4">
                    <i class="bx bxs-user fs-1 text-primary"></i>
                    <p class="mb-1 mt-2 text-secondary">Total Users</p>
                    <h3 class="mb-0 text-dark fw-semibold">{{ $totalCustomers }} Users</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 rounded-3">
                <div class="card-body p-4">
                    <i class="bx bx-calendar fs-1 text-primary"></i>
                    <p class="mb-1 mt-2 text-secondary">Scheduled Reservation</p>
                    <h3 class="mb-0 text-dark fw-semibold">{{ $totalReservations }} Reservations</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
