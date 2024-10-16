@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center py-5" style="min-height: 100vh">
            <div class="col-md-5">
                <div class="card border-0">
                    <div class="card-body p-5">
                        <a href="." class="mb-5 d-flex align-items-center gap-2 fs-5 fw-bold text-dark">
                            <img src="assets2/images/logo.png" style="width: 40px" alt="logo">
                            Pet Shop
                        </a>

                        <h5 class="text-dark fw-bold mb-4">Register</h5>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="mb-1">Name</label>
                                <input id="name" type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Insert your name"
                                    value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="mb-1">Email address</label>
                                <input id="email" type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Insert your email address" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="mb-1">Password</label>
                                <input id="password" type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Insert your password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm" class="mb-1">Password Confirmation</label>
                                <input id="password-confirm" type="password" name="password_confirmation"
                                    class="form-control" required>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Register</button>
                            <p class="mb-0 mt-2 text-secondary text-center">
                                Already have an account? <a href="{{ route('login') }}"
                                    class="text-decoration-underline text-primary">Log In</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
