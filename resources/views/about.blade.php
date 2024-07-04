@extends('layout.depan')

@section('content')


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Le Zato | About</title>
    <style>
.blink {
  animation: blink-animation 1s steps(5, start) infinite;
  -webkit-animation: blink-animation 1s steps(5, start) infinite;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
.animasi-teks {
  font-size: 29px;
  width: 100%;
  white-space:nowrap;
  overflow:hidden;
  -webkit-animation: typing 3s steps(70, end)infinite;
  animation: animasi-ketik 3s steps(70, end)infinite;
}

@keyframes animasi-ketik{
  from { width: 0; }
}

@-webkit-keyframes animasi-ketik{
  from { width: 0; }
}





        .container:after {
            content: "";
            display: block;
            clear: both;

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

</style>
</head>
<body>
 <div class="container">


            <div class="row">
             <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('template/dist/img/kls.png') }}');">

          <span class="blink"><a href="https://youtu.be/I4RyEvANVqI"><span class="fa fa-play-circle fa-5x"  style="color:red;text-shadow:6px 5px gold"></span></a></span>

      </div>
      <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
        <div class="heading-section-bold mb-4 mt-md-5">
          <div class="ml-md-0">
                 <marquee direction="left" behavior="slide" scrollamount="80" width="500px"> <h1 class="mb-4" style="color: rgb(201, 0, 0);"><b>Selamat Datang di Resto <br>Online Le zato</b></h1></marquee>
          </div>
           <marquee direction="left" behavior="slide" scrollamount="80" width="500px"><div class="animasi-teks"><h5 style="color: rgb(201, 0, 0);">Jajan enak, murah mengenyangkan</h5></div></marquee>
            <marquee direction="left" behavior="slide" scrollamount="80" width="500px"> <p>Lezato adalah Resto yang Menjual Produk SPW XII RPL 3 <br>khususnya makanan Ringan, Berat, Basah dan minuman </p></marquee>
               <marquee direction="left" behavior="slide" scrollamount="80" width="500px">  <span class="blink"><p><a href="/" class="btn btn s" style="background-color: rgb(201, 0, 0);border-radius: 150px; color:white">Belanja sekarang!</a></p></span></marquee>
        </div>

      </div>
    </div>
  </div>


  <div class="container" style="margin-top:5rem">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h5 class="subheading" style="color: rgb(201, 0, 0);">Testimony</h5>
        <h2 class="mb-4" style="color: rgb(255, 110, 110);">Apa yang pelanggan kami katakan?</h2>
      </div>
    </div>
    <div class="container">
        <div class="row">

            @foreach($data as $komen)

             <div class="hh" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" >
                <div class="col-3">
                    <div class="card" style="width: 16rem;height:13rem; margin-top:2rem; margin-bottom:2rem; padding-right:2rem; background-color:rgb(255, 247, 247);border-top-color:rgb(255, 247, 247);border-bottom-color:rgb(255, 247, 247);border-right:5px solid rgb(201, 0, 0);border-left:5px solid rgb(201, 0, 0);">
                            <h5 style="text-align:center;color:brown">{{ $komen->nmplgn }}</h5>
                        <div class="card-body">
                            <h5 class="card-title" style="text-align:center;margin-top:1rem;color:rgb(255, 110, 110)">{{ $komen->komen }}</h5>
                                 <a href="{{ asset('gmbrkomen/'.$komen->gmbrkomen)}}"><img src="{{ asset('gmbrkomen/'.$komen->gmbrkomen)}}" alt="" style="width:40px;margin-top:1rem;"></a>
                            <p style="margin-top:3rem;color:brown">{{ $komen->katkomen }} <span style="color:grey;">{{ $komen->tnggl }}</span></p>

                        </div>

                    </div>
                </div>
            </div>
           @endforeach

        </div>
    </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>

@endsection
