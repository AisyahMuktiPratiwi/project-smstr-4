<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Produks;
use App\Models\Kategoris;
use App\Models\Komens;
use App\Models\User;


class DashboardController extends Controller
{
    public function index(){
        $kategori = Kategoris::all();
        $data=Produks::all();
        $komen=Komens::all();
        return view('frontend.index', compact('data', 'kategori','komen'));
    }

    public function product($id = null)
    {
        $kategori = Kategoris::all();
        $data = $id ? Produks::where('kategori', $id)->get() : Produks::all();
        $komen=Komens::all();
        return view('frontend.index', compact('data', 'kategori','komen'));
    
    }

  
    public function search(Request $request)
    {
        $keyword = $request->search;
        $kategori =Kategoris::all();
        $komen=Komens::all();
        $data = Produks::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('frontend.index', compact('data','kategori','komen'))->with('i', (request()->input('page', 1) - 1) * 5);
  
    }

    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $produks = Produks::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nama" => $produks->nama,
                "quantity" => 1,
                "harga" => $produks->harga,
                "gambar" => $produks->gambar
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk Berhasil Ditambahkan Ke Keranjang!');
    }
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Keranjang Berhasil Terupdate');
        }
    }
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Produk berhasil dihapus dari keranjang.');
                return response()->json(['success' => true]);
            }
        }
        return response()->json(['success' => false]);
    }
    

    public function datakomens(){
        $komen = Komens::all();
        $kategori= Kategoris::all();
        $data= Produks::all();
        return view('frontend.index', compact('komen','kategori','data'));
    }
 
     public function allkomens(){
        $komen = Komens::all();
        $kategori= Kategoris::all();
        $data= Produks::all();
        return view('frontend.allcoments', compact('komen','kategori','data'));
    }
 
    
}