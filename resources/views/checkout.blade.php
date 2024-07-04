@extends('frontend.templateindex')

@section('content')
<style>
body{
background-color:rgb(192, 49, 49)}</style>
<div class="container">
    <h1 class="text-center mt-5" style="color: #ffd837;">Konfirmasi Pembayaran</h1>
    <form action="{{ route('pembayaran') }}" method="POST" enctype="multipart/form-data" style="border-radius: 10px; background-color: rgb(192, 49, 49); padding: 10px;">
        @csrf
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input   style="border-radius: 10px; "type="text" name="name" class="form-control" value="{{Auth::user()->name}}" required>
                </div>
                <div class="mb-3">
                    <label for="no_meja" class="form-label">No Meja</label>
                    <input   style="border-radius: 10px; " type="text" name="no_meja" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="metodepembayaran" class="form-label">Metode Pembayaran</label>
                    <select   style="border-radius: 10px; "class="form-select" name="metodepembayaran" required>
                        <option value="" disabled selected>Metode Pembayaran</option>
                        <option value="cash">Cash</option>
                        <option value="Dana">Dana | 085676764362</option>
                        <option value="OVO">OVO |  085676764362</option>
                        <option value="BCA">BCA | 5227854566</option>
                        <option value="BNI">BNI | 0123324576</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Daftar Produk yang Dibeli -->
                @php $total = 0; @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                @php $subtotal = $details['harga'] * $details['quantity']; $total += $subtotal; @endphp
                <div class="mb-3">
                    <label for="produk_{{ $id }}_nama" class="form-label">Nama Produk</label>
                    <input  style="border-radius: 10px; " type="text" class="form-control" id="produk_{{ $id }}_nama" readonly value="{{ $details['nama'] }}">
                </div>
                <div class="mb-3">
                    <label for="produk_{{ $id }}_jumlah" class="form-label">Jumlah</label>
                    <input    style="border-radius: 10px; "type="number" class="form-control" id="produk_{{ $id }}_jumlah" readonly value="{{ $details['quantity'] }}">
                </div>
                <div class="mb-3">
                    <label for="produk_{{ $id }}_subtotal" class="form-label">Subtotal</label>
                    <input  style="border-radius: 10px; "type="text" class="form-control" id="produk_{{ $id }}_subtotal" readonly value="Rp. {{ number_format($subtotal, 2) }}">
                </div>
                @endforeach
                <div class="mb-3">
                    <label for="totalHarga" class="form-label">Total Harga</label>
                    <input  style="border-radius: 10px; " type="text" class="form-control" id="totalHarga" readonly value="Rp. {{ number_format($total, 2) }}">
                </div>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="kodeunik" class="form-label">Kode Unik</label>
            <input  style="border-radius: 10px; " type="text" class="form-control" id="kodeunik" name="kodeunik" value="{{ $nomer }}" readonly>
        </div>
        <div class="mb-3">
            <label for="bukti" class="form-label">Bukti Pembayaran</label>
            <input  style="border-radius: 10px; "type="file" class="form-control" id="bukti" name="bukti">
        </div>
        <br>
        <div class="text-end">
            <button type="submit" class="btn btn-primary" style="background-color: rgb(255, 208, 0);color:rgb(100, 0, 0);border-radius:10px">Pesan</button>
        </div>
    </form>
    
</div>
<br>
<br>
@endsection
