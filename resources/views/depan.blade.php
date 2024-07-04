@extends('layout.depan')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <title>Le Zato | Home</title>

    <style>
    .section {
        padding: 25px 0;

    }

    .container {
        width: 80%;
        margin: 0 auto;
    }

    .container:after {
        content: "";
        display: block;
        clear: both;

    }





    .col-5 {
        width: 20%;
        height: 100%;
        text-align: center;
        float: left;
        box-sizing: border-box;
    }

    .card:hover {
        box-shadow: 0 0 15px #ac0000;
    }

    @media (min-width:768px) {


        .hh {
            width: auto;
            float: none;
            max-width: 50%;
            display: flex;
            flex-wrap: wrap;
        }
    }

    .swiper {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 40%;
        height: 40%;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
    }
    </style>
</head>

<body>

    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="{{ asset('template/dist/img/banner1.jpeg') }}" alt="First slide" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template/dist/img/cs1.png') }}" alt="Second slide" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template/dist/img/cs2.png') }}" alt="Third slide" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="section">
        <div class="container" style="color: white;margin-top:5rem; margin-right:3rem;">
            <div class="box">
                <a href="" style="color: inherit;">
                    <div class="col-5">
                        <img src="{{asset('template/dist/img/cilok.png') }}" width="250px;" style="margin-bottom: 5px;">
                    </div>
                </a>
                <a href="" style="color: inherit;">
                    <div class="col-5">
                        <img src="{{asset('template/dist/img/kerpik.png') }}" width="100px;" style="margin-top:50x;">
                    </div>
                </a>
                <a href="" style="color: inherit;">
                    <div class="col-5">
                        <img src="{{asset('template/dist/img/seblak.png') }}" width="150px;"
                            style="margin-bottom: 5px;">
                    </div>
                </a>
                <a href="" style="color: inherit;">
                    <div class="col-5">
                        <img src="{{asset('template/dist/img/tapoki.png') }}" width="150px;"
                            style="margin-bottom: 5px;">
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <h3 style="color:rgb(218, 0, 0)">Produk</h3>

        <div class="row">
            @foreach($data as $row)
            <div class="hh">
                <div class="col-3">
                    <div class="card"
                        style="width: 18rem; margin-top:2rem; margin-bottom:2rem; background-color:white;padding-right:2rem;">
                        <img src="{{ asset('gambarproduk/'.$row->gambar)}}"
                            style="height:15rem; width:15rem; margin-left:1rem; margin-top:1rem" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color: rgb(173, 0, 0);">{{ $row->nama }}</h5>
                            <p class="card-text"><button type="button" class="btn btn-sm"
                                    style="margin-left:8rem;border-radius: 150px;background-color:rgb(255, 110, 110);color:white">Rp.{{ $row->harga }}-</button>
                            </p>
                            <a href="/detail/{{ $row->id}}" class="btn"
                                style="background-color:rgb(160, 189, 221);color:white">Detail</a>
                            <a href="{{ route('add.to.cart', $row->id) }}" class="btn"
                                style="background-color:mediumseagreen"><img
                                    src="{{ asset('template/dist/img/a.png') }}" alt="" style="width:30px;"></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>


    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{asset('template/dist/img/s1 (1).jpeg')}}" />
            </div>
            <div class="swiper-slide">
                <img src="{{asset('template/dist/img/s1 (2).jpeg')}}" />
            </div>
            <div class="swiper-slide">
                <img src="{{asset('template/dist/img/s1 (3).jpeg')}}" />
            </div>

        </div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
    </script>







    <!--  <div class="container">
        <div class="card mb-3" style="max-width: 80rem; margin-top:5rem;background-color:rgb(255, 144, 144);margin-top:7rem;border:5px dashed rgb(201, 1, 1); border-radius:20px ">
            <h1 style="text-align: center; color:rgb(141, 31, 31);padding-top:3rem;">PANDUAN BELANJA</h1>
            <p style="text-align: center; color:rgb(141, 31, 31); font-size:20px;">Silahkan Untuk Mengikuti Panduan Belanja diBawah ini</p>
            <p style="text-align: center; color:rgb(141, 31, 31); font-size:20px;">
            <ol style="margin-left: 10rem;color:rgb(141, 31, 31);padding-right:8rem;padding-bottom:3rem">
                <li>Buat Akun. (Anda diharuskan untuk membuat akun terlebih dahulu dengan menginputkan nama, alamat, email dan lain sebagainya sesuai form pendaftaran yang disediakan)</li>
                <li>Login. (Jika anda sudah mempunyai akun maka anda bisa langsung login dengan<br> menginputkan username dan password)</li>
                <li>Pilih Produk. (Anda dapat memilih produk sesuai kebutuhan dan keinginan anda di <br>bagian etalase produk)</li>
                <li>Tambah Keranjang. (Anda dapat memasukan produk yang anda inginkan kedalam keranjang dengan klik icon keranjang)</li>
                <li>Detail Produk. (Anda dapat melihat lebih lengkap mengenai informasi <br>produk dengan klik detail)</li>
                <li>Checkout. (Anda dapat membeli produk yang anda inginkan dengan cara mengklik <br>checkout pada halaman detail produk)</li>
                <li>Konfirmasi Pembayaran. (Anda diharuskan untuk mengkonfirmasi alamat,nama penerima<br> dan metode pembayaran serta bukti bayar)</li>
                <li>Tunggu Pesanan. (Setealah Anda mengikuti langkah-langkah diatas anda tinggal menunggu barang sampai jika ada masalah pada pesanan dapat menghubungi email)</li>
        </div>-->
    </div>

</html>

@endsection