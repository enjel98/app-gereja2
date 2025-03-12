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
    {{--<link rel="stylesheet" href="{{asset('css/style2.css')}}">--}}
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


<section>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="card shadow" style="padding: 25px">
                    <div class="card-body">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>JudulTema & Bacaan Alkitab</th>
                                <th>Download</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fhk as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->judul_fhk}}</td>
                                    <td>{{$item->tema_fhk}} - {{$item->bacaan_alkitab}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-download"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
