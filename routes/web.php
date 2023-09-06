<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\wisata;

use App\http\Controllers\landing\HomeController;
use App\http\Controllers\landing\WisataController;
use App\http\Controllers\landing\DetailwisataController;
use App\http\Controllers\landing\TransaksiController;

use App\http\Controllers\dashboard\DashboardController;
use App\http\Controllers\dashboard\DetaildatawisataController;
use App\http\Controllers\dashboard\DatawisataController;
use App\http\Controllers\dashboard\DatarekeningController;
use App\http\Controllers\dashboard\RequestmitraController;
use App\http\Controllers\dashboard\PromotionController;

use App\http\Controllers\auth\LoginController;
use App\http\Controllers\auth\RegisterController;

//AUTH
Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Grup
Route::group(['middleware' => ['auth', 'ceklevel:user']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
    Route::get('/join-mitra', [RequestmitraController::class, 'tambah'])->name('join-mitra.index');
    Route::get('/pesanan-saya', [HomeController::class, 'pesanan'])->name('pesanan-saya.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

});

//LANDING
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/pesanan-saya', [HomeController::class, 'pesanan'])->name('pesanan-saya.index');
Route::get('/form-penilaian', [HomeController::class, 'penilaian'])->name('form-penilaian');

//DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/data-order', [DashboardController::class, 'order'])->name('data-order.index');
Route::get('/kategori', [DashboardController::class, 'kategori'])->name('kategori.index');
Route::get('/request-mitra', [DashboardController::class, 'requestmitra'])->name('request-mitra.index');
Route::get('/data-user', [DashboardController::class, 'user'])->name('data-user.index');

//DATA WISATA 
Route::get('/data-wisata', [DatawisataController::class, 'index'])->name('data-wisata.index');
Route::get('/tambah-data-wisata', [DatawisataController::class, 'tambah'])->name('tambah-data-wisata.index');
Route::post('/tambah-data-wisata', [DatawisataController::class, 'store'])->name('Wisata.index');
Route::get('/data-wisata/edit/{id_wisata}', [DatawisataController::class, 'edit'])->name('edit-data-wisata.index');
Route::put('/data-wisata/update/{id_wisata}', [DatawisataController::class, 'update'])->name('updateWisata.index');
Route::get('/data-wisata/hapus/{id_wisata}', [DatawisataController::class, 'hapus'])->name('hapus.index');
Route::pattern('id', '[0-9]+');
Route::get('/detail-data-wisata/{id}', [DetaildatawisataController::class,'showdetail']);
Route::get('/data-wisata/search_data_wisata',[DatawisataController::class, 'search_data_wisata'])->name('wisata.search_data_wisata');

//DATA REKENINGG
Route::get('/data-rekening', [DatarekeningController::class, 'index'])->name('data-rekening.index');
Route::get('/tambah-data-rekening', [DatarekeningController::class, 'tambah'])->name('tambah-data-rekening.index');
Route::post('/tambah-data-rekening', [DatarekeningController::class, 'store'])->name('Rekening.index');
Route::get('/data-rekening/edit/{id}', [DatarekeningController::class, 'edit'])->name('edit-data-rekening.index');
Route::put('/data-rekening/update/{id}', [DatarekeningController::class, 'update'])->name('updateRekening.index');
Route::get('/data-rekening/hapus/{id}', [DatarekeningController::class, 'hapus'])->name('hapus.index');
Route::get('/search_data_rekening',[DatarekeningController::class, 'search_data_rekening'])->name('rekening.search_data_rekening');

// DETAIL WISATA
Route::pattern('id', '[0-9]+');
Route::get('/{id}', [DetailwisataController::class,'show']);

// MITRA
Route::get('/request-mitra', [RequestmitraController::class, 'index'])->name('request-mitra.index');
Route::get('/join-mitra', [RequestmitraController::class, 'tambah'])->name('join-mitra.index');
Route::post('/join-mitra', [RequestmitraController::class, 'store'])->name('Mitra.index');
Route::get('/request-mitra/hapus/{id_mitra}', [RequestmitraController::class, 'hapus'])->name('hapus.index');
Route::get('/search_data_mitra',[RequestmitraController::class, 'search_data_mitra'])->name('mitra.search_data_mitra');

// TRANSAKSI
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

// PROMOTION
Route::get('/promotion', [PromotionController::class, 'index'])->name('promotion.index');
Route::get('/tambah-promotion', [PromotionController::class, 'tambah'])->name('tambah-promotion.index');
Route::post('/tambah-promotion', [PromotionController::class, 'store'])->name('Promotion.index');
Route::get('/promotion/edit/{id}', [PromotionController::class, 'edit'])->name('edit-promotion.index');
Route::put('/promotion/update/{id}', [PromotionController::class, 'update'])->name('updatePromotion.index');
Route::get('/promotion/hapus/{id}', [PromotionController::class, 'hapus'])->name('hapus.index');
Route::get('/search_promotion',[PromotionController::class, 'search_promotion'])->name('promotion.search_promotion');

//SEARCH RANGE TANGGAL
Route::get('/search_date', function (Request $request) {
    $startDate = $request->input('start-date');
    $endDate = $request->input('end-date'); 
    $wisata = wisata::whereBetween('tanggalberangkat', [$startDate, $endDate])->get();

    return view('landing.wisata', compact('wisata'));

})->name('wisata.search_date');

// SEARCH WISATA
Route::get('/search',[WisataController::class, 'search'])->name('wisata.search');
