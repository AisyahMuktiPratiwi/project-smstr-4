<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Produks;
use App\Models\Kategoris;


class ProdukController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Kategoris::all();
        $data = Produks::all();
        return view('dataproduk', compact('data'));
    }
    public function tambahproduk()
    {
        $kategori = Kategoris::all();
        return view('tambahdata', compact('kategori'));
    }
    public function insertproduk(Request $request)
    {

        $kategori = Kategoris::all();
        $data = Produks::create($request->all());
        if ($request->hasfile('gambar')) {
            $request->file('gambar')->move('gambarproduk/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('produk', compact('kategori'))->with('success', 'Data Berhasil diTambahkan');
    }
    public function tampilkanproduk($id)
    {
        $kategori = Kategoris::all();
        $data = Produks::find($id);
        return view('tampilkanproduk', compact('data', 'kategori'));
    }
    public function updateproduk(Request $request, $id)
    {


        $data = Produks::find($id);
        $data->update($request->all());
        if ($request->hasfile('gambar')) {
            $request->file('gambar')->move('gambarproduk/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect('produk')->with('success', 'Data Berhasil diUpdate');
    }
    public function deleteproduk($id)
    {
        $data = Produks::find($id);
        $data->delete();
        return redirect('produk')->with('success', 'Data Berhasil diHapus');
    }


 


  



 
   


}
