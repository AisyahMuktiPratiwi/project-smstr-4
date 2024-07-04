<?php

namespace App\Http\Controllers;

use App\Models\Kategoris;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategoris::all();
        return view('datakategori', compact('data'));
    }
    public function tambahkategori()
    {
        return view('tambahkategori');
    }
    public function insertkategori(Request $request)
    {
        $data = Kategoris::create($request->all());
        if ($request->hasfile('gambar')) {
            $request->file('gambar')->move('gambarkategori/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
      

        return redirect()->route('kategori')->with('success', 'Data Berhasil diTambahkan');
    }
    public function tampilkankategori($id)
    {
        $data = Kategoris::find($id);
        return view('tampilkankategori', compact('data'));
    }
    public function updatekategori(Request $request, $id)
    {
        $data = Kategoris::find($id);
        $data->update($request->all());
        if ($request->hasfile('gambar')) {
            $request->file('gambar')->move('gambarkategori/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect('kategori')->with('success', 'Data Berhasil diUpdate');
    }
    public function deletekategori($id)
    {
        $data = Kategoris::find($id);
        $data->delete();
        return redirect('kategori')->with('success', 'Data Berhasil diHapus');
    }

}
