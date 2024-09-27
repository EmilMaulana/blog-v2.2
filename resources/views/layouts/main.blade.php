<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kursus Laravel, Kursus PHP, Kursus VueJS, Kursus Git, Kursus Pemrograman, Kursus Koding, Kursus Membuat Web, Kursus Web Development, Training Laravel, Training PHP, Training VueJS, Training Git, Kursus Koding Karawang, Kursus Koding Cikarang, Kursus Koding Bekasi, Kursus Laravel Karawang, Kursus Laravel Cikarang, Kursus Laravel Bekasi, Kursus VueJS Karawang, Kursus VueJS Surabaya, Kursus VueJS Bekasi, Kursus Programming Karawang, Kursus Programming Surabaya, Kursus Android Karawang, Kursus Android Surabaya, Kursus Web Karawang, Kursus Web Surabaya, Kursus Web Bekasi, Kursus PHP Karawang, Kursus PHP Surabaya, Kursus PHP Bekasi, Kursus Website Karawang, Kursus Website Surabaya, Kursus Website Bekasi, Kursus Laravel Murah, Kursus PHP Murah, Kursus VueJS Murah">
    <meta property="og:title" content="Teknik Rekayasa: inovasi terbaru dari mahasiswa Teknik Informatika">
    <meta property="og:description" content="Inovasi terbaru dari mahasiswa Teknik Informatika yang berdedikasi untuk berbagi pengetahuan dan semangat pemrograman dengan Anda!">
    <meta property ="og : url" content="https://www.teknikrekayasa.com">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    {{-- tema --}}
    <script src="https://kit.fontawesome.com/f1ecbb1f89.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Source+Sans+Pro&family=Titillium+Web:wght@700&family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('tema/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css.map') }}">

    <title>{{ $title }}</title>

    {{-- icon --}}
    <link rel="icon" href="{{ asset('assets/img/icon.png') }}" width="150px;" type="image/png">

  </head>
<body class="badan bg-light">

    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow">
        <div class="container">
            <a class="" href="/">
                <img src="{{ asset('assets/img/icon.png') }}" alt="Icon" width="45px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="navbar-toggler-icon">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ ( $active === "home" ) ? 'active' : '' }} fw-bold" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ( $active === "artikel" ) ? 'active' : '' }} fw-bold" href="/artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ( $active === "categories" ) ? 'active' : '' }} fw-bold" href="/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ( $active === "about" ) ? 'active' : '' }} fw-bold" href="/about">Tentang Kami</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item mr-2 my-2">
                        <form action="/dashboard" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary" href="#"><i class="fas fa-tachometer-alt mr-2"></i>My Dashboard</button>
                        </form>
                    </li>
                    <li class="nav-item mr-2 my-2">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger" href="#"><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    {{-- navbar --}}

    <div class="mt-5">
        @yield('content')
    </div>

    <footer class="page-footer bg-white shadow">
        <div class="container">
            <div class="row mt-n5">
                <div class="col-md-6 mt-n3">
                    <img src="{{ asset('assets/img/main-logo.png') }}" alt="" class="img-fluid ml-n4" style="width: 300px">
                    <p class="text-dark">
                        Teknik Rekayasa, inovasi terbaru dari mahasiswa Teknik Informatika yang berdedikasi untuk berbagi pengetahuan dan semangat pemrograman dengan Anda!
                    </p>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-4 ">
                    {{-- <h5 class="text-dark mt-4">Alamat</h5> --}}
                    {{-- <p>
                       <i class="fas fa-map-marked mt-4"></i> Gang Mandala III Karawang Wetan, Karawang Timur, Karawang
                    </p> --}}
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-md-6">
                    <small class="">&copy Copyright <a href="https://www.instagram.com/teknikrekayasa_/" class="text-decoration-none" target="_blank">Teknik Rekayasa</a> by <a href="https://www.instagram.com/emilmaul_/" class="text-decoration-none" target="_blank">Emil Maulana</a>. All Rights Reserved</small>
                </div>
                <div class="col-md-6 text-end">
                    <small>Made With <span style="color: #ff0000;"><i class="fa-solid fa-heart"></i></span> in Kawali, West Java, ID</small>
                </div>
            </div>
        </div>
    </footer>

    

    
    <script src="{{ asset('tema/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('tema/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js.map') }}"></script>
    <script src="{{ asset('tema/js/google-maps.js') }}"></script>
    <script src="{{ asset('tema/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('tema/js/theme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    
</body>
</html>