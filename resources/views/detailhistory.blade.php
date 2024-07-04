@extends('frontend.templateindex')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Zato | Detail Histori Pembelian</title>
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
                <h1 class="m-0" style="color: #ffd837">Detail Riwayat Pembelian </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                    <li class="breadcrumb-item"><a href="/" style="color: #ffd837">Home</a></li>
                    <li class="breadcrumb-item"><a href=""  style="color:#f1ecd7">Detail Riwayat Pemeblian</a></li>
                    <li class="breadcrumb-item active"  style="color: #ffd837"><a href="/historipembelian" style="color: #ffd837">Riwayat Pembelian</a></li>
                </ol>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Total Item</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderItems as $orderItem)
                            <tr>
                                <td>{{ $productNames[$orderItem->id] }}</td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ $orderItem->price }}</td>
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

    <!-- Script to show modal -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if ({{ session('success') ? 'true' : 'false' }}) {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }
        });
    </script>
</body>

</html>
@endsection