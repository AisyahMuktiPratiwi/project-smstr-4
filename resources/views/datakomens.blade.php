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
                            <h1 style="text-align: center; color: rgb(201, 0, 0); font-family: 'Quintessential', cursive;"><b>Kelola komens Testimony</b></h1>
                        </div>
                    </div>

                    <div class="col-sm-6 text-end">
                      <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item"><a href="/home" style="color:rgb(199, 0, 0)">Home</a></li>
                          <li class="breadcrumb-item active" style="color:rgb(201, 167, 167)">Data Komen</li>
                      </ol>
                  </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="card" style="box-shadow: rgb(219, 217, 251) 5px 6px 12px;">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif
                <table class="table table-striped table-responsive-md">
                    <thead style="background-color: rgb(201, 0, 0); color: white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Komentar</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: rgb(255, 171, 161); color: rgb(24, 22, 22);">
                        @php
                        $no = 1;
                        @endphp
                        @foreach($data as $komens)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $komens->nmplgn }}</td>
                            <td>{{ $komens->komen }}</td>
                            <td>{{ $komens->tnggl }}</td>
                            <td>
                                <a href="/deletekomens/{{ $komens->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
