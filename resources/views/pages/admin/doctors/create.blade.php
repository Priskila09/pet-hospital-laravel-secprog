@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h2 class="mb-0">Add new doctors</h2>
        <a href="{{ route('dokter.index') }}" class="btn btn-light border">
            <i class="bx bx-arrow-back"></i>Cancel</a>
    </div>

    <form action="{{ route('dokter.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name">Doctor Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="specialist">Specialist</label>
            <input type="text" name="specialist" id="specialist" value="{{ old('specialist') }}"
                class="form-control @error('specialist') is-invalid @enderror">
            @error('specialist')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <textarea name="address" id="address" cols="30" rows="3"
                class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
            @error('address')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save New</button>
    </form>
@endsection
