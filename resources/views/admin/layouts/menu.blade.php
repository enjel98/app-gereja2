<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex flex-column align-items-center justify-content-center mt-3">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/img/logos/logogereja.png') }}" style="width:100px; height:50px;" alt="Logo">
        </div>
        <div class="sidebar-brand-text mt-2">PP-MG KGPM</div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active bg-primary' : '' }} mt-4">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - FHK -->
    <li class="nav-item {{ Request::is('admin/fhk*') ? 'active bg-primary' : '' }}">
        <a class="nav-link" href="{{ route('fhk.index') }}">
            <i class="fas fa-file-word"></i>
            <span>FHK</span>
        </a>
    </li>

    <!-- Nav Item - Pendamping FHK -->
    <li class="nav-item {{ Request::is('admin/pendamping-fhk*') ? 'active bg-primary' : '' }}">
        <a class="nav-link" href="{{ route('pendamping-fhk.index') }}">
            <i class="fas fa-file-word"></i>
            <span>Pendamping FHK</span>
        </a>
    </li>

    <!-- Nav Item - Data Gembala -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-users"></i>
            <span>Data Gembala</span>
        </a>
    </li>

    <!-- Nav Item - Suara Gembala -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-bullhorn"></i>
            <span>Suara Gembala</span>
        </a>
    </li>

    <!-- Nav Item - Mimbar KGPM -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-cross"></i>
            <span>Mimbar KGPM</span>
        </a>
    </li>

    <!-- Nav Item - Berita -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-newspaper"></i>
            <span>Berita</span>
        </a>
    </li>

    <!-- Nav Item - Galeri -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-image"></i>
            <span>Galeri</span>
        </a>
    </li>

    <!-- Nav Item - Renungan Online -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-play-circle"></i>
            <span>Renungan Online</span>
        </a>
    </li>

    <!-- Nav Item - Persembahan Pelayanan -->
    <li class="nav-item {{ Request::is('admin/persembahan*') ? 'active bg-primary' : '' }}">
        <a class="nav-link" href="{{route(('persembahan.index'))}}">
            <i class="fas fa-hand-holding-heart"></i>
            <span>Persembahan Pelayanan</span>
        </a>
    </li>

    <!-- Nav Item - Config -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-cog"></i>
            <span>Config</span>
        </a>
    </li>

    <!-- Nav Item - Profile -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>
    </li>

    <!-- Nav Item - User -->
    <li class="nav-item has-submenu">
        <a class="nav-link" href="#">
            <i class="fas fa-users-cog"></i> User
            <span class="submenu-toggle">&#9662;</span>
        </a>
        <ul class="submenu">
            <li><a href="#"><i class="fas fa-user-check"></i> Verif User</a></li>
            <li><a href="#"><i class="fas fa-list"></i> Daftar User</a></li>
        </ul>
    </li>
</ul>
