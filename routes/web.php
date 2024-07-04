<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use App\Models\Produks;
use App\Models\Kategoris;
use App\Models\User;
use App\Models\Komens;
use App\Models\Testis;
use App\Models\OrdersItem;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('dashboard');
});


Route::get('/depan', [DashboardController::class, 'index'])->name('depan');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/search', [DashboardController::class, 'search'])->name('search');

Route::get('/menu/{id?}', [DashboardController::class, 'product'])->name('menu.by.category');
Route::get('/dashbord', [DashboardController::class, 'datakomens'])->name('komen');

Route::get('/dashbord', [DashboardController::class, 'allkomens'])->name('all.comments');






Route::get('cart', [DashboardController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [DashboardController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [DashboardController::class, 'update'])->name('update.cart');
Route::get('remove-from-cart', [DashboardController::class, 'remove'])->name('remove.from.cart');
Route::get('/', [DashboardController::class, 'datakomens'])->name('datakomen');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/tambahproduk', [ProdukController::class, 'tambahproduk'])->name('tambahproduk');
Route::post('/insertproduk', [ProdukController::class, 'insertproduk'])->name('insertproduk');
Route::get('/tampilkanproduk/{id}', [ProdukController::class, 'tampilkanproduk'])->name('tampilkanproduk');
Route::post('/updateproduk/{id}', [ProdukController::class, 'updateproduk'])->name('updateproduk');
Route::get('/deleteproduk/{id}', [ProdukController::class, 'deleteproduk'])->name('deleteproduk');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/tambahkategori', [KategoriController::class, 'tambahkategori'])->name('tambahkategori');
Route::post('/insertkategori', [KategoriController::class, 'insertkategori'])->name('insertkategori');
Route::get('/tampilkankategori/{id}', [KategoriController::class, 'tampilkankategori'])->name('tampilkankategori');
Route::post('/updatekategori/{id}', [KategoriController::class, 'updatekategori'])->name('updatekategori');
Route::get('/deletekategori/{id}', [KategoriController::class, 'deletekategori'])->name('deletekategori');

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
Route::post('/pembayaran', [App\Http\Controllers\HomeController::class, 'pembayaran'])->name('pembayaran');

Route::get('/invoice', [HomeController::class, 'invoice'])->name('invoice');
Route::get('/detailinv/{id}', [HomeController::class, 'detailinv'])->name('detailinv');
Route::put('/ubah-status-invoice/{id}', [HomeController::class, 'updateStatus'])->name('ubahStatusInvoice');
Route::get('/cetakinv/{id}', [HomeController::class, 'cetakinv'])->name('cetakinv');
Route::get('/user', [HomeController::class, 'user'])->name('user');
Route::get('/tambahkomen', [HomeController::class, 'tambahkomen'])->name('tambahkomen');
Route::post('/insertkomen', [HomeController::class, 'insertkomen'])->name('insertkomen');
Route::get('/historipembelian', [HomeController::class, 'historipembelian'])->name('historipembelian');
Route::get('/detailhistory/{id}', [HomeController::class, 'detailhistory'])->name('detailhistory');

Route::get('/deletekomens/{id}', [HomeController::class, 'deletekomens'])->name('deletekomens');
Route::get('/datakomens', [HomeController::class, 'datakomens'])->name('datakomens');
