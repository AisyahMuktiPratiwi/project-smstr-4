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
                            <h1 style="text-align:center; color: rgb(201, 0, 0); font-family: 'Quintessential', cursive;"><b>Kelola Data Kategori</b></h1>
                        </div>
                    </div>
                    <div class="col-sm-6 text-end">
                      <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item"><a href="/home" style="color:rgb(199, 0, 0)">Home</a></li>
                          <li class="breadcrumb-item active" style="color:rgb(201, 167, 167)">Data Kategori</li>
                      </ol>
                  </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container">
      

        <div class="card" style=" box-shadow: rgb(219, 217, 251) 5px 6px 12px;">
            <div class="card-body">
                <table id="myTable" class="table table-striped table-responsive-md">
                    <thead style="color:  rgb(201, 0, 0);">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $kat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kat->nm }}</td>
                            <td>
                                <img src="{{ asset('gambarkategori/'.$kat->gambar) }}" alt="" style="width: 100px;">
                            </td>
                            <td>
                                <a href="/tampilkankategori/{{ $kat->id }}" style="color: rgb(255, 187, 0);"><i
                                        class="fas fa-edit"></i></a>
                                <a href="/deletekategori/{{ $kat->id }}"
                                    style="color: rgb(173, 0, 0); margin-left: 10px;"><i
                                        class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="/tambahkategori"><i class="fas fa-plus-circle fa-3x"
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
