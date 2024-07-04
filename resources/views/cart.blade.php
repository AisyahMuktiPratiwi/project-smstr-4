@extends('frontend.templateindex')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<div class="container">
    <div class="table-responsive">
        <table id="cart" class="table table-hover" style="margin-top:3rem;">
            <thead style="background-color:rgb(255, 53, 53); color:rgb(251, 255, 0)">
                <tr>
                    <th style="width:30%">Produk</th>
                    <th style="width:20%">Harga</th>
                    <th style="width:20%">Jumlah</th>
                    <th style="width:20%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody style="background-color:rgb(255, 171, 161); color:rgb(24, 22, 22)">
                @php $total = 0 @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                @php $total += $details['harga'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <img src="{{ asset('gambarproduk/'. $details['gambar'] )}}" width="100" height="100" class="img-responsive" />
                            </div>
                            <div class="col-sm-12 col-md-6" >
                                <h4 class="nomargin" style="color:rgb(255, 81, 0)">{{ $details['nama'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp.{{ $details['harga'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center subtotal">Rp.{{ $details['harga'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <a href="{{ route( 'remove.from.cart') }}" class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong style="color: rgb(245, 150, 150);">Total Rp.<span id="total">{{ $total }}</span></strong></td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="5" class="text-right"> <a href="{{ url('/') }}" class="btn btn-warning" style="color: rgb(141, 0, 0)"><i class="fa fa-angle-left" style="color:rgb(141, 0, 0)"></i>   Kembali Belanja</a>

                        <a href="/checkout" class="btn" style="background-color:rgb(255, 70, 14);color:rgb(255, 240, 174)">Checkout <i class="fa fa-angle-right" style="color:rgb(255, 240, 174))"></i> </a>
                       
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(".update-cart").change(function(e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: "{{ route('update.cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Apa Kamu Yakin Akan Menghapus?")) {
            $.ajax({
                url: "{{ route( 'remove.from.cart' ) }}",
                method: "get",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });

    // Update subtotal and total when quantity changes
    $(".quantity").change(function() {
        var quantity = $(this).val();
        var price = $(this).closest('tr').find('.harga').text();
        var subtotal = quantity * price;
        $(this).closest('tr').find('.subtotal').text('Rp.' + subtotal);

        var total = 0;
        $('.subtotal').each(function() {
            total += parseFloat($(this).text().replace('Rp.', ''));
        });
        $('#total').text(total);
    });
</script>
@endsection
