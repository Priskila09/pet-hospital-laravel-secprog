@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h2 class="mb-0">Edit Doctor</h2>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
            <i class="bx bx-arrow-back"></i> Cancel</a>
    </div>

    <form action="{{ route('dokter.update', $doctor->id) }}" method="post">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="name">Doctor Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $doctor->name }}">
        </div>

        <div class="mb-3">
            <label for="specialist">Specialist</label>
            <input type="text" name="specialist" id="specialist" class="form-control" value="{{ $doctor->specialist }}">
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $doctor->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
@endsection
