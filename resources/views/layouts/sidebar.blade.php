<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="#"><img src="{{ asset('assets/images/logo/logoatios.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        @if(auth()->user()->role == 'anggota')
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-item {{ Route::currentRouteName() == "anggota.dashboard" ? 'active' : '' }}">
                        <a href="{{ route('anggota.dashboard') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Route::currentRouteName() == "anggota.lacak" ? 'active' : '' }}">
                        <a href="{{ route('anggota.lacak') }}" class='sidebar-link'>
                            <i class="bi bi-send-fill"></i>
                            <span>Lacak</span>
                        </a>
                    </li>
                </ul>
            </div>
        @elseif(auth()->user()->role == 'umum')
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-item {{ Route::currentRouteName() == "anggota.info" ? 'active' : '' }}">
                        <a href="{{ route('anggota.info') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Informasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Route::currentRouteName() == "anggota.profilumum" ? 'active' : '' }}">
                        <a href="{{ route('anggota.profilumum') }}" class='sidebar-link'>
                            <i class="bi bi-person"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Route::currentRouteName() == "anggota.identitasumum" ? 'active' : '' }}">
                        <a href="{{ route('anggota.identitasumum') }}" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Kartu Identitas</span>
                        </a>
                    </li>
                </ul>
            </div>
        @elseif(auth()->user()->role == 'asc')
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-item {{ Route::currentRouteName() == "anggota.info" ? 'active' : '' }}">
                        <a href="{{ route('anggota.info') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Informasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Route::currentRouteName() == "anggota.profilasc" ? 'active' : '' }}">
                        <a href="{{ route('anggota.profilasc') }}" class='sidebar-link'>
                            <i class="bi bi-person"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Route::currentRouteName() == "anggota.identitasasc" ? 'active' : '' }}">
                        <a href="{{ route('anggota.identitasasc') }}" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Kartu Identitas</span>
                        </a>
                    </li>
                </ul>
            </div>
        @endif
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
