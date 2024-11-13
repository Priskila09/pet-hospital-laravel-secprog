@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h2 class="mb-0">Edit User Role</h2>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            <i class="bx bx-arrow-back"></i> Back to Users List
        </a>
    </div>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="roles">Role</label>
            <select name="roles" id="roles" class="form-control">
                <option value="user" {{ $user->roles === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->roles === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Role</button>
    </form>
@endsection
