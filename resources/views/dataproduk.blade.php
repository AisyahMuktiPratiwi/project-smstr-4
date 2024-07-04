@extends('layout.admin')

@section('content')
<script src=
"https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="content-wrapper" style="background-color: rgb(255, 247, 247);">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card" style="background-color: rgb(255, 247, 247); box-shadow: rgb(219, 217, 251) 5px 6px 12px;">
                        <div class="card-body">
                            <h1 style="text-align:center; color: rgb(201, 0, 0); font-family: 'Quintessential', cursive;"><b>Kelola Data Produk</b></h1>
                        </div>
                     
                    </div>
                    <div class="col-sm-6 text-end">
                      <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item"><a href="/home" style="color:rgb(199, 0, 0)">Home</a></li>
                          <li class="breadcrumb-item active" style="color:rgb(201, 167, 167)">Data Produk</li>
                      </ol>
                  </div>
                  
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    
    <div class="container">
        <div class="card" style="box-shadow: rgb(219, 217, 251) 5px 6px 12px;">
            <div class="card-body">
                <div class="table-responsive-md">
                    <table id="myTable" class="table table-striped">
                        <thead style="color:  rgb(201, 0, 0);">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Deksripsi</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->kategori }}</td>
                                <td>{!! strip_tags($row->deskripsi) !!}</td>
                                <td>Rp.{{ $row->harga }}</td>
                                <td>
                                    <img src="{{ asset('gambarproduk/'.$row->gambar) }}" alt="" width="100px">
                                </td>
                                <td>
                                    <a href="/tampilkanproduk/{{ $row->id }}" style="color: rgb(255, 187, 0);"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="/deleteproduk/{{ $row->id }}"
                                        style="color: rgb(173, 0, 0); margin-left: 10px;"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="/tambahproduk"><i class="fas fa-plus-circle fa-3x"
                        style="float: right; margin-top: 2rem; padding-right: 2rem; color: rgb(211, 0, 0);"></i></a>
            </div>
        </div>
    </div>

</div>
<script>
    @if(session('success'))
    Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    @endif
    
</script>

@endsection
