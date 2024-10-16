@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center py-5" style="min-height: 100vh">
            <div class="col-md-5">
                <div class="card border-0">
                    <div class="card-body p-5">
                        <a href="." class="mb-5 d-flex align-items-center gap-2 fs-5 fw-bold text-dark">
                            <img src="assets2/images/logo.png" style="width: 40px" alt="logo">
                            Pet Hospital
                        </a>

                        <h5 class="text-dark fw-bold mb-4">Log In</h5>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="mb-1">Email Address</label>
                                <input id="email" type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Insert your email" value="{{ old('email') }}" required autofocus>
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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Login</button>
                            <p class="mb-0 mt-2 text-secondary text-center">
                                No account yet? <a href="{{ route('register') }}"
                                    class="text-decoration-underline text-primary">Register</a>
                            </p>
                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
