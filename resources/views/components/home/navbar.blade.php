<nav class="navbar navbar-expand-lg">
    <div class="container border-bottom py-3">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2 text-primary" href=".">
            <img src="{{ url('assets2/images/logo.png') }}" width="40" alt="Logo" />
            Pet Hospital
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                        href=".">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary px-4" href="{{ route('home.reservation') }}">
                        <i class="bx bx-calendar"></i> Reservation
                    </a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="btn btn-light border px-4 dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-user"></i> Hi, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->roles == 'Admin')
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('home.order.history') }}">Order History</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile Setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                    Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Include Bootstrap JS Bundle with Popper -->
<script src="{{ url('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>



<script src="{{ url('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
