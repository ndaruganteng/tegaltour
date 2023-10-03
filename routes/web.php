<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\wisata;

use App\http\Controllers\landing\HomeController;
use App\http\Controllers\landing\WisataController;
use App\http\Controllers\landing\DetailwisataController;
use App\http\Controllers\landing\TransaksiController;
use App\http\Controllers\landing\PemesananController;
use App\http\Controllers\landing\UlasanController;
use App\http\Controllers\landing\HistoryController;

use App\http\Controllers\dashboard\DashboardController;
use App\http\Controllers\dashboard\DetaildatawisataController;
use App\http\Controllers\dashboard\DatawisataController;
use App\http\Controllers\dashboard\DatarekeningController;
use App\http\Controllers\dashboard\RequestmitraController;
use App\http\Controllers\dashboard\DatauserController;

use App\http\Controllers\Auth\LoginController;
use App\http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

//AUTH
Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Grup User 
Route::group(['middleware' => ['auth', 'ceklevel:user']], function(){
    Route::get('/join-mitra', [RequestmitraController::class, 'tambah'])->name('join-mitra.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/pesanan-saya', [UlasanController::class, 'store'])->name('Ulasan.index');
    Route::get('/history', [HistoryController::class, 'history_user'])->name('history.index');
});

//LANDING
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/pesanan-saya', [PemesananController::class, 'pesanan_saya'])->name('pesanan-saya.index');
Route::get('/join-mitra', [RequestmitraController::class, 'tambah'])->name('join-mitra.index');


Route::group(['middleware' => ['auth', 'ceklevel:mitra']], function(){  
    
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
    Route::post('/data-rekening', [DatarekeningController::class, 'store'])->name('Rekening.index');
    Route::get('/data-rekening/edit/{id_rekening}', [DatarekeningController::class, 'edit'])->name('edit-data-rekening.index');
    Route::put('/data-rekening/update/{id_rekening}', [DatarekeningController::class, 'update'])->name('updateRekening.index');
    Route::get('/data-rekening/hapus/{id_rekening}', [DatarekeningController::class, 'hapus'])->name('hapus.index');
    Route::get('/search_data_rekening',[DatarekeningController::class, 'search_data_rekening'])->name('rekening.search_data_rekening');

    // DATA-ORDER
    Route::get('/data-order', [PemesananController::class, 'data_order'])->name('data-order.index');
    
    // STATUS PERJALANAN
    Route::get('/status-perjalanan', [PemesananController::class, 'status_perjalanan'])->name('status-perjalanan.index');
    Route::put('/berangkat/{id_pemesanan}', [PemesananController::class, 'berangkat'])->name('berangkat');
    Route::put('/selesai/{id_pemesanan}', [PemesananController::class, 'selesai'])->name('selesai');

});


Route::group(['middleware' => ['auth', 'ceklevel:admin']], function(){

    //DASHBOARD
    Route::get('/request-mitra', [DashboardController::class, 'requestmitra'])->name('request-mitra.index');

    //DATAUSER
    Route::get('/data-user', [DatauserController::class, 'index'])->name('data-user.index');
    Route::get('/search_user',[DatauserController::class, 'search_user'])->name('users.search_user');

 });

 Route::group(['middleware' => ['auth', 'ceklevel:admin,mitra']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});


// DETAIL WISATA
Route::pattern('id', '[0-9]+');
Route::get('/{id}', [DetailwisataController::class,'show']);

//SEARCH RANGE TANGGAL
Route::get('/search_date', function (Request $request) {
    $startDate = $request->input('start-date');
    $endDate = $request->input('end-date'); 
    $wisata = wisata::whereBetween('tanggalberangkat', [$startDate, $endDate])->get();
    return view('landing.wisata', compact('wisata'));

})->name('wisata.search_date');

// SEARCH WISATA
Route::get('/search',[WisataController::class, 'search'])->name('wisata.search');

// PEMESANAN
Route::post('/boking', [PemesananController::class, 'store']);
Route::get('/invoice/{id_pemesanan}', [PemesananController::class, 'pdf']);
Route::put('/konfirmasi/{id_pemesanan}', [PemesananController::class, 'konfirmasi'])->name('konfirmasi');
Route::get('/data-order/hapus/{id}', [PemesananController::class, 'hapus'])->name('hapus.index');
Route::group(['middleware' => ['auth','ceklevel:user']], function(){
    Route::post('/upload-bukti_pembayaran/{id}', [PemesananController::class, 'update'])->name('upload-bukti_pembayaran');
});

// MITRA
Route::get('/join-mitra', [RequestmitraController::class, 'tambah'])->name('join-mitra.index');
Route::get('/request-mitra', [RequestmitraController::class, 'index'])->name('request-mitra.index');
Route::post('/join-mitra', [RequestmitraController::class, 'store'])->name('Mitra.index');
Route::get('/request-mitra/hapus/{id_mitra}', [RequestmitraController::class, 'hapus'])->name('hapus.index');
Route::get('/search_data_mitra',[RequestmitraController::class, 'search_data_mitra'])->name('mitra.search_data_mitra');


// ResetPassword
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


