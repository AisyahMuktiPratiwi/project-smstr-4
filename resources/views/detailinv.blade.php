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
                            <h1 style="text-align: center; color: rgb(201, 0, 0); font-family: 'Quintessential', cursive;"><b>Detail Invoice</b></h1>
                        </div>
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

@endsection
