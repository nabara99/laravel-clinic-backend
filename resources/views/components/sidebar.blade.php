<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">klinik Sehat</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ str_contains(Route::currentRouteName(), 'home') ? 'active' : '' }}">
                <a href="{{ route('home') }}"><i class="fa-solid fa-chart-line"></i>
                    <span>Dashboard</span></a>
            </li>
            @if(auth()->user()->role == 'admin')
                <li class="{{ str_contains(Route::currentRouteName(), 'user') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}"><i class="fa-regular fa-user"></i>
                        <span>Pengguna</span></a>
                </li>
            @endif
            <li class="{{ str_contains(Route::currentRouteName(), 'doctor') ? 'active' : '' }}">
                <a href="{{ route('doctor.index') }}"><i class="fa-solid fa-stethoscope"></i>
                    <span>Dokter</span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'schedule') ? 'active' : '' }}">
                <a href="{{ route('schedule.index') }}"><i class="fa-regular fa-clock"></i>
                    <span>Jadwal Dokter</span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'patient') ? 'active' : '' }}">
                <a href="{{ route('patient.index') }}"><i class="fa-solid fa-hospital-user"></i>
                    <span>Pasien</span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'service-medicines') ? 'active' : '' }}">
                <a href="{{ route('service-medicines.index') }}"><i class="fa-solid fa-pills"></i>
                    <span>Layanan Medis</span></a>
            </li>
        </ul>
    </aside>
</div>
