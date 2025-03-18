<!DOCTYPE html>
<html lang="en">
<head>
    <title>KGPM MUSAFIR</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}"/>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>

<body id="page-top">
<!-- Navigation-->
@include('layout.navbar')

<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">FHK</div>
        <div class="font-weight-bold" style="font-size: 20px !important;">Firman Hidup Dan Kerja.</div>
    </div>
</header>


<section class="page-section bg-light" id="berita">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Persembahan Pelayanan</h2>
            <h3 class="section-subheading text-muted">Daftar persembahan pelayanan terbaru</h3>
        </div>
        <div class="row">
            @foreach($persembahan as $item)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="berita-item">
                        <a class="berita-link" data-bs-toggle="modal" href="#beritaModal{{ $item->id }}">
                            <div class="berita-hover">
                                <div class="berita-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <div class="image-container">
                                <img class="modal-image" src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->deskripsi }}" />
                            </div>
                        </a>
                        <div class="berita-caption">
                            <div class="berita-caption-heading">{{ $item->sidang }}</div>
                            <div class="berita-caption-subheading text-muted">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk setiap berita -->
                <div class="berita-modal modal fade" id="beritaModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal">
                                <img src="{{ asset('assets/img/close-icon.svg') }}" alt="Close modal" />
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Detail Persembahan -->
                                            <h2 class="text-uppercase">{{ $item->sidang }}</h2>

                                            <!-- Gambar -->
                                            <img class="img-fluid d-block mx-auto mt-4" src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->deskripsi }}" />

                                            <!-- Deskripsi (pindah ke bawah gambar) -->
                                            <p class="item-intro text-muted mt-3 text-center custom-text">
                                                {{ $item->deskripsi }}
                                            </p>


                                            <ul class="list-inline">
                                                <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</li>
                                                <li><strong>Sidang:</strong> {{ $item->sidang }}</li>
                                            </ul>

                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i> Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('js/scripts.js')}}"></script>
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>
</html>
