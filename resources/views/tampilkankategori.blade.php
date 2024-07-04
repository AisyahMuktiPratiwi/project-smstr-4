@extends('layout.admin')

@section('content')

<div class="content-wrapper" style="background-color: rgb(255, 247, 247);">

    <div class="container">
        <div class="card shadow-sm" style="background-color: rgba(255, 255, 255, 0.9);">
            <div class="card-body">
                <div class="card" style="color:  rgb(201, 0, 0);; box-shadow: 5px 6px 12px rgb(219, 217, 251); background-color: rgba(255, 255, 255, 0.9); padding: 20px;">
                    <h2 class="text-center" style="font-family: 'Quintessential', cursive;"><b>Edit Data Kategori</b></h2>
                </div>
                <ol class="breadcrumb mb-4" style="background-color:  rgba(255, 255, 255, 0.9)">
                  <li class="breadcrumb-item"><a href="/kategori" style="color:rgb(199, 0, 0)">Data Kategori</a></li>
                  <li class="breadcrumb-item active" style="color:rgb(201, 167, 167)">Edit Data Kategori</li>
              </ol>
                <form action="/updatekategori/{{$data->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                        <input type="text" name="nm" class="form-control" id="exampleInputEmail1" value="{{ $data->nm }}" aria-describedby="emailHelp" style="border-color:rgb(201, 0, 0);">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gambar</label>
                        <br>
                        <img src="{{ asset('gambarkategori/'.$data->gambar)}}" alt="" style="width: 100px; border: 1px solid rgb(201, 0, 0); margin-bottom: 10px;">
                        <input type="file" class="form-control" name="gambar" id="exampleInputEmail1" aria-describedby="emailHelp" style="border-color:rgb(201, 0, 0);">
                    </div>

                    <button type="submit" class="btn" style="background-color:rgb(201, 0, 0); color:white;">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

@section('styles')
<style>
    .content-wrapper {
        padding: 20px;
    }

    .card {
        margin-top: 20px;
    }

    .card-body {
        padding: 30px;
    }

    .form-label {
        color: rgb(201, 0, 0);
    }

    .btn-primary {
        background-color: rgb(201, 0, 0);
        color: white;
        border: none;
    }

    @media (max-width: 992px) {
        .card-body {
            padding: 20px;
        }
    }

    @media (max-width: 768px) {
        .card-body {
            padding: 10px;
        }

        .card {
            margin-top: 10px;
        }

        .form-label {
            font-size: 14px;
        }
    }
</style>
@endsection
