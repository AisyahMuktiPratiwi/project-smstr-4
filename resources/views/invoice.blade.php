@extends('layout.admin')

@section('content')

<div class="content-wrapper" style="background-color: rgb(255, 247, 247);">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card"
                        style="background-color: rgb(255, 247, 247); box-shadow: rgb(219, 217, 251) 5px 6px 12px;">
                        <div class="card-body">
                            <h1 style="text-align: center; color: rgb(201, 0, 0); font-family: 'Quintessential', cursive;"><b>Kelola Data Invoice</b></h1>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="card" style="box-shadow: rgb(219, 217, 251) 5px 6px 12px;">
            <div class="card-body">
                <table id="myTable" class="table table-striped table-responsive-md">
                    <thead style="color: rgb(201, 0, 0);">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Meja</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Total</th>
                            <th scope="col">Bukti</th>
                            <th scope="col">Status</th>
                            <th scope="col">Print</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($data as $inv)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td> <a href="/detailinv/{{ $inv->id }}">{{ $inv->kodeunik }}</a></td>
                            <td>{{ $inv->name }}</td>
                            <td>{{ $inv->no_meja }}</td>
                            <td>{{ $inv->metodepembayaran }}</td>
                            <td>{{ $inv->totalharga }}</td>
                            <td><a href="{{ asset('buktiproduk/'.$inv->bukti) }}"><img
                                        src="{{ asset('buktiproduk/'.$inv->bukti) }}" alt="" style="width: 40px;"
                                        onclick="showImage('{{ asset('buktiproduk/'.$inv->bukti) }}')"></a></td>
                            <td>
                                <button class="status-btn"
                                    style="color: white; border: none; background-color: {{ $inv->status === 'pending' ? 'orange' : 'green' }}"
                                    data-id="{{ $inv->id }}" data-status="{{ $inv->status }}">
                                    {{ $inv->status }}
                                </button>
                            </td>
                            <td><a href="{{ route('cetakinv', $inv->id) }}" class="btn btn-sm btn-danger"><i
                                        class="fa fa-print" aria-hidden="true"></i> Print</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk menangani perubahan status -->
<script>
    // Ambil semua tombol dengan class status-btn
    document.querySelectorAll('.status-btn').forEach(button => {
        // Tambahkan event click untuk setiap tombol
        button.addEventListener('click', function () {
            // Ambil ID dan status dari tombol yang diklik
            const id = this.getAttribute('data-id');
            let status = this.getAttribute('data-status');

            // Tampilkan dialog konfirmasi
            if (confirm(`Apakah Anda yakin ingin mengubah status menjadi ${status === 'pending' ? 'konfirm' : 'pending'}?`)) {
                // Ubah status
                if (status === 'pending') {
                    status = 'konfirm';
                } else if (status === 'konfirm') {
                    status = 'pending';
                }

                // Kirim permintaan AJAX ke server untuk mengubah status
                fetch(`/ubah-status-invoice/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan Anda sudah menyertakan CSRF token
                    },
                    body: JSON.stringify({ status: status }) // Kirim data status ke server
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal mengubah status');
                    }
                    // Jika sukses, reload halaman untuk memperbarui data
                    window.location.reload();
                })
                .catch(error => {
                    console.error(error);
                });
            }
        });
    });
</script>

@endsection
