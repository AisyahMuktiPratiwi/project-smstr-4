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
                            <h1 style="text-align: center; color: rgb(201, 0, 0); font-family: 'Quintessential', cursive;"><b>Data User</b></h1>
                        </div>
                    </div>
                    <div class="col-sm-6 text-end">
                      <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item"><a href="/home" style="color:rgb(199, 0, 0)">Home</a></li>
                          <li class="breadcrumb-item active" style="color:rgb(201, 167, 167)">Data User</li>
                      </ol>
                  </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container">
        <div class="card" style="box-shadow: rgb(219, 217, 251) 5px 6px 12px;">
            <div class="card-body">
                <table class="table table-striped table-responsive-md">
                    <thead style="color: rgb(201, 0, 0);">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($data as $user)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
