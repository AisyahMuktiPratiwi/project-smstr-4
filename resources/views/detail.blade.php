@extends('layout.depan')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Zato | Detail Produk</title>
</head>

<body>
    <div class="container">

        <div class="card mb-3" style="max-width: 80rem; margin-top:5rem; ">
            <div class=" row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('gambarproduk/'.$data->gambar)}}" style="margin-left:2rem;width:500rem"
                        class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="color: rgb(201, 0, 0); margin-top:1rem; ">
                        <h1 class="card-title" style="color: rgb(201, 0, 0); text-align:center;font-size:50px">
                            {{ $data->nama }}</h1>
                        <table class="table" style="margin-left: 8rem; width:500px;margin-top:2rem">
                            <tbody style="border-color:thistle; color:black">
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>{{ $data->nm }}</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td>{{ $data->stok }}</td>
                                </tr>
                                <td>Rasa</td>
                                <td>:</td>
                                <td>
                                    <ul>
                                        <li>
                                            {{ $data->rasa }}
                                        </li>

                                    </ul>
                                </td>
                                </tr>

                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-sm"
                                            style="border-radius: 150px;background-color: rgb(201, 0, 0);color:white;width:10rem">Rp.
                                            {{ $data->harga }},00-</button></td>
                                </tr>

                            </tbody>
                        </table>



                        <p class="card-text" style="margin-left:15rem;font-size:25px"><span> </span>
                            </span>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('cart') }}" class="btn"
            style="background-color:sandybrown;color:white;float:right;margin-right:2rem">Beli</a>
        <a href="{{ route('add.to.cart', $data->id) }}" class="btn"
            style="background-color:mediumseagreen;float:right;margin-right:2rem"><img
                src="{{ asset('template/dist/img/a.png') }}" alt="" style="width:30px;"></a>


    </div>
</body>

</html>
@endsection
