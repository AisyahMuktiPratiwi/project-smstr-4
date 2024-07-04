<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body style="background-color:rgb(255, 247, 247);">
    <nav class="navbar navbar-expand-lg navbar-light navbar-hover" style="background-color: rgb(201, 0, 0);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: rgb(201, 0, 0);">Navbar scroll</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/" style="color: white;"> <img
                                src="{{ asset('template/dist/img/logo2.png') }}" alt="" width="30" height="40">
                            <strong style="font-family:cursive; font-size: 20px;"> Le Zato</strong></a>
                    </li>
                    <li class="nav-item" style="margin-left: 30rem;">
                        <a class="nav-link active" aria-current="page" href="/login" style="color:inherit;"><img
                                src="{{ asset('template/dist/img/log.png') }}" alt="" width="30" height="24"
                                class="d-inline-block align-text-top"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/register" style="color:inherit;"><img
                                src="{{ asset('template/dist/img/e.png') }}" alt="" width="30" height="24"
                                class="d-inline-block align-text-top"></a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="background-color: rgb(201, 0, 0);border:none">
                                Page
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId"
                                style="background-color:rgb(255, 247, 247);">
                                <a class="dropdown-item" href="/about">About</a>
                                <a class="dropdown-item" href="/tambahkomen">Testimony</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('cart') }}"
                            style="color:inherit;"><img src="{{ asset('template/dist/img/a.png') }}" alt="" width="30"
                                height="24" class="d-inline-block align-text-top"> <span
                                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span></a>
                        <div class="dropdown-menu">
                            <div class="row total-header-section">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <img src="{{ asset('template/dist/img/a.png') }}" alt="" width="30" height="24"
                                        class="d-inline-block align-text-top"> <span
                                        class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                </div>

                            </div>
                    </li>
                </ul>

                <form class="d-flex" method="get" action="/search">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline" value="SEARCH" type="submit"
                        style="border-color: white; color:white">Search</button>
                </form>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn"><img src="{{ asset('template/dist/img/f.png') }}" alt=""
                            width="30" height="24" class="d-inline-block align-text-top"></button>

                </form>
            </div>
        </div>
    </nav>
    <div class="container">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

    </div>
    @yield('content')

    <footer>
        <div class="row"
            style="background-color: rgb(201, 0, 0);padding-top:3rem;color:white; padding-left:5rem;margin-top:13rem">

            <div class="col-3">
                <h2>Informasi Resto</h2>
                <p style="margin-top: 1rem;">Lezato</p>
                <p>Foods & Drinks</p>
                <p>Bogor</p>
                <p>Rekening:9797 9797</p>
            </div>
            <div class="col-3">
                <h2>Produk</h2>
                <p style="margin-top: 1rem;">Produk Tebaik</p>
                <p>Diskon</p>
                <p>Bonus</p>

            </div>
            <div class="col-3">
                <h2>Metode Pembayaran</h2>
                <p style="margin-top: 1rem;">COD</p>
                <p>Transfer Bank </p>
                <div class="bank" style="background-color:rgb(255, 247, 247);width:200px">
                    <img src="{{ asset('template/dist/img/dana.png') }}" width="80px;"><span> <img
                            src="{{ asset('template/dist/img/bni.png') }}" width="80px;"></span>
                    <p><img src="{{ asset('template/dist/img/bri.png') }}" width="80px;"><span> <img
                                src="{{ asset('template/dist/img/bca.png') }}" width="80px;"></span></p>
                </div>
            </div>
            <div class="col-3">
                <h2>Media Sosial/Hubungi Kami? </h2>
                <p style="margin-top: 1rem;"><i class="fab fa-whatsapp fa-2x"></i> <a
                        href="https://api.whatsapp.com/send?phone=6285322564784"
                        style="color:white;text-decoration:none"> 085322564784</a></p>
                <p><i class="far fa-envelope fa-2x"></i> <a href="mailto:lzato172@gmail.com"
                        style="color:white;text-decoration:none">lzato172@gmail.com</a></p>
                <p><i class="fab fa-instagram fa-2x"></i> <a
                        href="https://instagram.com/mammamia_lezato?utm_medium=copy_link"
                        style="color:white;text-decoration:none">mammamia_lezato</a></p>

                <p><i class="fab fa-youtube fa-2x"></i> <a
                        href="https://www.youtube.com/channel/UCuMXIguvMfkzQf2oUdABY-A"
                        style="color:white;text-decoration:none">Le Zato</a></p>
            </div>
        </div>
        <footer style="color:white;background-color: rgb(201, 0, 0); text-align:center">
            Copyright &copy; 2021 Le Zato,by Aisyah Putri Suci Vivi
        </footer>
    </footer>
    @yield('scripts')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>