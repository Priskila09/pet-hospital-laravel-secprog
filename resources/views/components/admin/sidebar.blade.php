<div class="col-lg-2 bg-white min-h-lg-screen py-3 px-2 px-lg-3 sidebar">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2 fs-5 fw-bold text-primary">
            <img src="{{ url('assets2/images/logo.png') }}" style="width: 40px" alt="logo">
            <span>Pet Hospital</span>
        </a>
        <button class="btn btn-light d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#navMenu">
            <i class="bx bx-menu"></i>
        </button>
    </div>
    <hr class="my-4 d-none d-lg-block border-secondary">
    <div class="menus d-none d-lg-block">
        <p class="mb-2 text-secondary fw-semibold fs-7">Main Menu</p>
        <a href="{{ route('admin.dashboard') }}" class="link-menu btn {{ request()->is('admin') ? 'active' : '' }}">
            <i class="bx bxs-dashboard"></i> Dashboard
        </a>



        <p class="mt-4 mb-2 text-secondary fw-semibold fs-7">Reservation</p>
        <a href="{{ route('dokter.index') }}"
            class="link-menu btn {{ request()->is('admin/doctors*') ? 'active' : '' }}">
            <i class='bx bx-user-pin'></i> Doctors
        </a>
        <a href="{{ route('reservasi.index') }}"
            class="link-menu btn {{ request()->is('admin/reservasi*') ? 'active' : '' }}">
            <i class="bx bxs-calendar"></i> Reservation
        </a>
        <p class="mt-4 mb-2 text-secondary fw-semibold fs-7">Setting</p>
        <a href="{{ route('homepage') }}" class="link-menu btn">
            <i class="bx bx-cog"></i> Pet Hospital
        </a>
        <a href="{{ route('logout') }}" class="link-menu btn"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bx bx-log-out"></i> Log Out
        </a>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="navMenu" aria-labelledby="navMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="navMenuLabel">Main</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="sidebar">
            <p class="mb-2 text-secondary fw-semibold fs-7">Menu</p>
            <a href="{{ route('admin.dashboard') }}"
                class="link-menu btn {{ request()->is('admin') ? 'active' : '' }}">
                <i class="bx bxs-dashboard"></i> Dashboard
            </a>


            <p class="mt-4 mb-2 text-secondary fw-semibold fs-7">Reservation</p>
            <a href="{{ route('dokter.index') }}"
                class="link-menu btn {{ request()->is('admin/doctors*') ? 'active' : '' }}">
                <i class='bx bx-user-pin'></i> Doctor
            </a>
            <a href="{{ route('reservasi.index') }}"
                class="link-menu btn {{ request()->is('admin/reservasi*') ? 'active' : '' }}">
                <i class="bx bxs-calendar"></i> Reservation
            </a>
            <p class="mt-4 mb-2 text-secondary fw-semibold fs-7">Setting</p>
            <a href="{{ route('homepage') }}" class="link-menu btn">
                <i class="bx bx-cog"></i> Pet Hospital
            </a>
            <a href="{{ route('logout') }}" class="link-menu btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bx bx-log-out"></i> Log Out
            </a>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
