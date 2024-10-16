@extends('layouts.home')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="mb-5">Edit Profile</h1>

            <h5 class="fw-semibold mb-3">Personal Information</h5>
            <div class="card mb-5">
                <div class="card-body p-4">
                    <button class="btn btn-primary px-4" type="button" onclick="edit()">
                        <i class="bx bx-edit"></i> Edit Profile
                    </button>

                    <table id="tableProfile" class="table mb-2">
                        <tr>
                            <td>Name</td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>
                                @if (Auth::user()->phone_number == '')
                                    <span class="text-danger">Phone Number has not been filled!</span>
                                @else
                                    {{ Auth::user()->phone_number }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                @if (Auth::user()->address == '')
                                    <span class="text-danger">Address has not been filled!</span>
                                @else
                                    {{ Auth::user()->address }}
                                @endif
                            </td>
                        </tr>
                    </table>

                    <form id="formEdit" action="{{ route('profile.update', Auth::user()->id) }}" method="post"
                        class="d-none">
                        @csrf @method('PUT')

                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password (Insert New Password if needed)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control"
                                value="{{ Auth::user()->phone_number }}">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ Auth::user()->address }}</textarea>
                        </div>

                        <button class="btn btn-primary px-4" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>

            <h5 class="fw-semibold mb-3">Pets</h5>
            <div class="card mb-5">
                <div class="card-body p-4">
                    <button class="btn btn-primary px-4" type="button" data-bs-toggle="modal" data-bs-target="#addPet">
                        <i class="bx bx-plus"></i> Add Pet
                    </button>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pet Name</th>
                                    <th>Pet Type</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->pets as $item)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pet_name }}</td>
                                        <td>{{ $item->pet_type }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editPet{{ $item->id }}">
                                                    <i class="bx bx-edit"></i> Edit
                                                </button>
                                                <form action="{{ route('pets.destroy', $item->id) }}" method="post">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Kamu yakin?')"
                                                        class="btn btn-light btn-sm">
                                                        <i class="bx bx-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editPet{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="editPet{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('pets.update', $item->id) }}" method="post">
                                                    @csrf @method('PUT')

                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editPet{{ $item->id }}Label">
                                                            Edit {{ $item->pet_name }}
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="pet_name">Pet Name</label>
                                                            <input type="text" name="pet_name" id="pet_name"
                                                                class="form-control" value="{{ $item->pet_name }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="pet_type">Pet Type</label>
                                                            <select name="pet_type" id="pet_type" class="form-select">
                                                                <option value="Kucing"
                                                                    {{ $item->pet_type == 'Kucing' ? 'SELECTED' : '' }}>
                                                                    Cat
                                                                </option>
                                                                <option value="Anjing"
                                                                    {{ $item->pet_type == 'Anjing' ? 'SELECTED' : '' }}>
                                                                    Dog
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h5 class="fw-semibold mb-3">Reservation History</h5>
            <div class="card mb-5">
                <div class="card-body p-4">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Reservation Date</th>
                                    <th>Reservation Time</th>
                                    <th>Doctor Name</th>
                                    <th>Message</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->reservations as $item)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->date_of_reservation }}</td>
                                        <td>{{ $item->time_of_reservation }} WIB</td>
                                        <td>{{ $item->doctor->name }}</td>
                                        <td>{{ $item->messages }}</td>
                                    </tr>

                                    >
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="addPet" tabindex="-1" aria-labelledby="addPetLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pets.store') }}" method="post">
                    @csrf

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addPetLabel">Add Pet</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="pet_name">Pet Name</label>
                            <input type="text" name="pet_name" id="pet_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="pet_type">Pet Type</label>
                            <select name="pet_type" id="pet_type" class="form-select">
                                <option value="Kucing">Cat</option>
                                <option value="Anjing">Dog</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save New</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        function edit() {
            const form = document.getElementById('formEdit');
            const profile = document.getElementById('tableProfile');

            form.classList.toggle('d-none');
            profile.classList.toggle('d-none');
        }
    </script>
@endpush
