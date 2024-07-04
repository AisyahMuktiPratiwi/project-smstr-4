<?php

namespace App\Http\Controllers;

use App\Models\Produks;
use App\Models\User;
use App\Models\Orders;
use App\Models\Komens;
use App\Models\OrdersItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jumlahproduk = Produks::count();
        $jumlahpesanan = Orders::count();
        $jumlahuser = User::count();
        return view('dashboardadmin', compact('jumlahproduk', 'jumlahpesanan', 'jumlahuser'));
    }

    public function checkout()
    {
        $tanggal = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulanTanggal = $now->year . $now->month . $now->day;
        $cek = Orders::count();
        if ($cek == 0) {
            $urut = 001;
            $nomer = 'INV' . $thnBulanTanggal . $urut;
        } else {
            $ambil = Orders::all()->last();
            $urut = (int)substr($ambil->kodeunik, 1) + 1;
            $nomer = 'INV' . $thnBulanTanggal . $urut;
        }
        return view('checkout', compact('tanggal', 'nomer'));
    }

    public function pembayaran(Request $request)
    {
        $request->validate([
            'kodeunik' => 'required',
            'metodepembayaran' => 'required',
            'no_meja' => 'required',
            'bukti' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $pesanan = new Orders();
        $pesanan->kodeunik = $request->kodeunik;
        $pesanan->name = $request->name;
        $pesanan->metodepembayaran = $request->metodepembayaran;
        $pesanan->no_meja = $request->no_meja;
        $pesanan->totalharga = 0;
    
        $pesanan->name = auth()->user()->name;
    
        foreach (session('cart') as $id => $details) {
            $harga_produk = Produks::findOrFail($id)->harga;
            $pesanan->totalharga += $harga_produk * $details['quantity'];
        }
    
        $pesanan->save();
    
        foreach (session('cart') as $id => $details) {
            $detail_pesanan = new OrdersItem();
            $detail_pesanan->order_id = $pesanan->id;
            $detail_pesanan->product_id = $id;
            $quantity = $details['quantity'];
            $harga_produk = Produks::findOrFail($id)->harga;
            $detail_pesanan->quantity = $quantity;
            $detail_pesanan->price = $harga_produk * $quantity;
            $detail_pesanan->save();
        }
    
        if ($request->hasFile('bukti')) {
            $bukti = $request->file('bukti');
            $filename = time() . '.' . $bukti->getClientOriginalExtension();
            $bukti->move(public_path('buktiproduk'), $filename);
            $pesanan->bukti = $filename;
            $pesanan->save();
        }
    
        return redirect()->route('historipembelian')
            ->with('success', 'Terimakasih telah melakukan pemesanan, mohon tunggu konfirmasi pembayaran, maka pesanan anda akan segera diproses.');
    }

    public function historiPembelian()
    {
        $userId = auth()->user()->name;
        $historipembelian = Orders::where('name', $userId)->get();
        return view('history_pembelian', compact('historipembelian'));
    }

    public function detailhistory($id)
    {
        $orderItems = OrdersItem::where('order_id', $id)->get();
        $productNames = [];

        foreach ($orderItems as $orderItem) {
            $productName = Produks::where('id', $orderItem->product_id)->value('nama');
            $productNames[$orderItem->id] = $productName;
        }

        return view('detailhistory', compact('orderItems', 'productNames'));
    }

    public function pesan()
    {
        return view('pesan');
    }

    public function tambahkomen()
    {
        $tanggal = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulanTanggal = $now->year . $now->month . $now->day;
        $produk = Produks::all();
        return view('tambahkomen', compact('produk','tanggal'));
    }

    public function insertkomen(Request $request)
    {
        $tanggal = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulanTanggal = $now->year . $now->month . $now->day;
        $data = Komens::create($request->all());
        $produk = Produks::all();
        return redirect()->route('depan', compact('data','produk','tanggal'))->with('success', 'Komentar berhasil dikirimkan');
    }

    public function datakomens(){
        $data = Komens::all();
        return view('datakomens', compact('data'));
    }
    public function deletekomens($id)
    {
        $data = Komens::find($id);
        $data->delete();
        return redirect('datakomens')->with('success', 'Data Berhasil diHapus');
    }

    public function invoice()
    {
        $data = Orders::all();
        return view('invoice', compact('data'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Temukan invoice berdasarkan ID
        $invoice = Orders::findOrFail($id);
        
        // Ubah status invoice sesuai dengan yang dikirimkan dari permintaan
        $invoice->status = $request->status;
        $invoice->save();
        
        // Kembalikan respon
        return response()->json(['message' => 'Status invoice berhasil diperbarui'], 200);
    }

    public function cetakinv($id)
    {

 // Ambil data pesanan berdasarkan ID
 $order = Orders::findOrFail($id);

 // Ambil semua item pesanan yang terkait dengan pesanan tersebut
 $orderItems = OrdersItem::where('order_id', $id)->get();
   // Array untuk menyimpan nama produk untuk setiap item pesanan
   $productNames = [];

   // Loop melalui setiap item pesanan dan ambil nama produk yang sesuai
   foreach ($orderItems as $orderItem) {
       $productName = Produks::where('id', $orderItem->product_id)->value('nama');
       $productNames[$orderItem->id] = $productName;
   }
       
        return view('cetakinv', compact('order', 'orderItems','productNames'));
    }

    public function detailinv($id)
    {

        // Ambil semua item pesanan berdasarkan ID pesanan
    $orderItems = OrdersItem::where('order_id', $id)->get();

    // Array untuk menyimpan nama produk untuk setiap item pesanan
    $productNames = [];

    // Loop melalui setiap item pesanan dan ambil nama produk yang sesuai
    foreach ($orderItems as $orderItem) {
        $productName = Produks::where('id', $orderItem->product_id)->value('nama');
        $productNames[$orderItem->id] = $productName;
    }

    // Kirim data item pesanan dan nama produk ke view
    return view('detailinv', compact('orderItems', 'productNames'));
    }




    public function user(){
    $data = User::all();
    return view('datauser', compact('data'));
    }
}
