<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="#page-top"><img src="{{asset('assets/img/logos/logogereja.png')}}"  style="width:100px;height:50px;"    alt="..." />
            <span class="d-none d-lg-inline">KERAPATAN GEREJA PROTESTAN MINAHASA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link"  href="{{route('beranda')}}">BERANDA</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ORGANISASI
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Sejarah KGPM</a></li>
                        <li><a class="dropdown-item" href="#">Struktur PPMG</a></li>
                        <li><a class="dropdown-item" href="#">Struktur Wilayah</a></li>
                        <li><a class="dropdown-item" href="#">Struktur Sidang</a></li>
                        <li><a class="dropdown-item" href="#">Daftar Wilayah</a></li>
                        <li><a class="dropdown-item" href="#">Daftar Sidang</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link"  href="{{route('home-page.fhk')}}">FHK</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('home-page.pendamping-fhk')}}">PENDAMPING FHK</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">DAFTAR GEMBALA</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('home-page.persembahan-pelayanan')}}">PERSEMBAHAN PELAYANAN</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">LOGIN</a></li>
            </ul>
        </div>
    </div>
</nav>
c
