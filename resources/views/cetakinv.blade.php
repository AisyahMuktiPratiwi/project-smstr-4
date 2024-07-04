<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #000;
            border-radius: 10px;
            background-color: #fff;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
        }

        .title {
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .details {
            border-top: 2px dashed #000;
            border-bottom: 2px dashed #000;
            padding: 10px 0;
            margin: 20px 0;
        }

        .details p {
            margin: 5px 0;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Logo">
    </div>
    <div class="title">
        <p>Struk Pembelian</p>
    </div>
    <div class="details">
        <p><strong>Nama:</strong> {{ $order->name }}</p>
        <p><strong>Kode Unik:</strong> {{ $order->kodeunik }}</p>
        <p><strong>No Meja:</strong> {{ $order->no_meja }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($order->totalharga, 0, ',', '.') }}</p>
        <p><strong>Produk:</strong></p>
        <ul>
            @foreach($orderItems as $orderItem)
                <li>{{ $productNames[$orderItem->id] }} ({{ $orderItem->quantity }}) - Rp {{ number_format($orderItem->price, 0, ',', '.') }}</li>
            @endforeach
        </ul>
    </div>
    <div class="total">
        <p>Total Pembelian: Rp {{ number_format($order->totalharga, 0, ',', '.') }}</p>
    </div>
    <div class="footer">
        <p>Terima kasih atas kunjungan Anda!</p>
    </div>
    <script type="text/javascript">window.print();</script>
</body>
</html>
