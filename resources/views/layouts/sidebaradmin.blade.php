<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/images/logo/logoatios.png') }}" width="100%" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ Route::currentRouteName() == "admin.dashboard" ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Anggota</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ Route::currentRouteName() == "admin.umum" ? 'active' : '' }}">
                            <a href="{{ route('admin.umum') }}">Anggota Umum</a>
                        </li>
                        <li class="submenu-item {{ Route::currentRouteName() == "admin.asc" ? 'active' : '' }}">
                            <a href="{{ route('admin.asc') }}">Anggota ASC</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::currentRouteName() == "admin.info" ? 'active' : '' }}">
                    <a href="{{ route('admin.info') }}" class='sidebar-link'>
                        <i class="bi bi-card-text"></i>
                        <span>Informasi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::currentRouteName() == "admin.profil" ? 'active' : '' }}">
                    <a href="{{ route('admin.profil') }}" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Profil</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
