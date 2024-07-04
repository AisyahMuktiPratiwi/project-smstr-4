@extends('frontend.templateindex')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Zato | Data Histori Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(192, 49, 49);
        }

      

        .table tbody {
            background-color: rgb(255, 171, 161);
            color: rgb(24, 22, 22);
        }

        .status-btn {
            color: white;
            border: none;
        }

        .status-btn.pending {
            background-color: orange;
        }

        .status-btn.completed {
            background-color: green;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        @if(session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Pesanan Berhasil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
        <div class="content-header mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-0" style="color: #ffd837">Riwayat Pembelian Anda</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" ><a href="/" style="color:#ffd837">Home</a></li>
                    <li class="breadcrumb-item active" style="color:#f1ecd7">History Pembelian Anda</li>
                </ol>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{ $message }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No Meja</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Total</th>
                                <th scope="col">Bukti</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($historipembelian as $inv)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td> <a href="/detailhistory/{{ $inv->id}}">{{ $inv->kodeunik }}</a></td>
                                <td>{{ $inv->name }}</td>
                                <td>{{ $inv->no_meja }}</td>
                                <td>{{ $inv->metodepembayaran }}</td>
                                <td>{{ $inv->totalharga }}</td>
                                <td>
                                    <a href="{{ asset('buktiproduk/'.$inv->bukti)}}">
                                        <img src="{{ asset('buktiproduk/'.$inv->bukti)}}" alt="" style="width:40px;" onclick="showImage('{{ asset('buktiproduk/'.$inv->bukti)}}')">
                                    </a>
                                </td>
                                <td>
                                    <button class="status-btn {{ $inv->status === 'pending' ? 'pending' : 'completed' }}" data-id="{{ $inv->id }}" data-status="{{ $inv->status }}">
                                        {{ $inv->status }}
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
 <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlZTKY7+H2q6P6K6dWoa1QZd4VNeYDhq1BuKoiTLE6bBl8ZkLP9yyKpJw/1" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG+gIKjfDhPpklH/SNkFZ9qqzzDCo3Sk5/ku2lKpD5tmawM2TtmF5oyK07p" crossorigin="anonymous"></script>

 <!-- Script to show modal -->
 <script>
     document.addEventListener("DOMContentLoaded", function () {
         var successModal = new bootstrap.Modal(document.getElementById('successModal'));
         successModal.show();
     });
 </script>

 @endsection