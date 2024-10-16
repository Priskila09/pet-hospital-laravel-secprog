@extends('layouts.home')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Reservation</h2>

        <form action="{{ url('reservation') }}" method="post">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="customer_name" value="{{ Auth::user()->name }}" class="form-control"
                    id="" readonly>
            </div>
            <div class="mb-3">
                <label for="date">Date</label>
                <input type="date" name="date_of_reservation" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="time">Time</label>
                <input type="time" name="time_of_reservation" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="doctors">Doctors</label>
                <select name="doctor_id" id="doctors" class="form-select">
                    @foreach ($doctors as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="messages">Messages</label>
                <textarea name="messages" id="messages" cols="30" rows="4" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary px-4" type="submit">Submit</button>
        </form>
    </div>
@endsection
