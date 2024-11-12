@extends('layouts.home')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Reservation</h2>

        <!-- Display flash success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Reservation form -->
        <form action="{{ url('reservation') }}" method="post">
            @csrf

            <!-- Hidden user ID field -->
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <!-- Display user's name in a readonly field -->
            <div class="mb-3">
                <label for="customer_name">Name</label>
                <input type="text" name="customer_name" value="{{ old('customer_name', Auth::user()->name) }}"
                    class="form-control" readonly>
                @error('customer_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Date field -->
            <div class="mb-3">
                <label for="date_of_reservation">Date</label>
                <input type="date" name="date_of_reservation" class="form-control"
                    value="{{ old('date_of_reservation') }}">
                @error('date_of_reservation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Time field -->
            <div class="mb-3">
                <label for="time_of_reservation">Time</label>
                <input type="time" name="time_of_reservation" class="form-control"
                    value="{{ old('time_of_reservation') }}">
                @error('time_of_reservation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Doctors selection dropdown -->
            <div class="mb-3">
                <label for="doctor_id">Doctors</label>
                <select name="doctor_id" id="doctor_id" class="form-select">
                    <option value="" disabled selected>Select a doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
                @error('doctor_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Messages field -->
            <div class="mb-3">
                <label for="messages">Messages</label>
                <textarea name="messages" id="messages" cols="30" rows="4" class="form-control">{{ old('messages') }}</textarea>
                @error('messages')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit button -->
            <button class="btn btn-primary px-4" type="submit">Submit</button>
        </form>
    </div>
@endsection
