<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\wisata;
use App\Models\kategori;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\WisataController;
use App\Http\Controllers\Landing\DetailwisataController;
use App\Http\Controllers\Landing\TransaksiController;
use App\Http\Controllers\Landing\PemesananController;
use App\Http\Controllers\Landing\UlasanController;
use App\Http\Controllers\Landing\HistoryController;
use App\Http\Controllers\Landing\BirowisataController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DetaildatawisataController;
use App\Http\Controllers\Dashboard\DatawisataController;
use App\Http\Controllers\Dashboard\DatarekeningController;
use App\Http\Controllers\Dashboard\RequestmitraController;
use App\Http\Controllers\Dashboard\DatauserController;
use App\Http\Controllers\Dashboard\DatakategoriController;
use App\Http\Controllers\Dashboard\PendapatanController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\OrderController;

//AUTH
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Grup User 
Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
    Route::get('/join-mitra', [RequestmitraController::class, 'tambah'])->name('join-mitra.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/pesanan-saya', [UlasanController::class, 'store'])->name('Ulasan.index');
    Route::get('/history', [HistoryController::class, 'history_user'])->name('history.index');
    Route::get('/profile-user', [HomeController::class, 'profile_user'])->name('profile_user');
    Route::post('/profile-user/update/{id}', [HomeController::class, 'updateprofileUser'])->name('profileUser.update');
    Route::post('/profile_user/change-password/{id}', [HomeController::class, 'changePassword'])->name('change_password_submit');
});


Route::group(['middleware' => ['auth', 'ceklevel:mitra']], function () {

    //DATA WISATA 
    Route::get('/data-wisata', [DatawisataController::class, 'index'])->name('data-wisata.index');
    Route::get('/tambah-data-wisata', [DatawisataController::class, 'tambah'])->name('tambah-data-wisata.index');
    Route::post('/tambah-data-wisata', [DatawisataController::class, 'store'])->name('Wisata.index');
    Route::get('/data-wisata/edit/{id_wisata}', [DatawisataController::class, 'edit'])->name('edit-data-wisata.index');
    Route::put('/data-wisata/update/{id_wisata}', [DatawisataController::class, 'update'])->name('updateWisata.index');
    Route::get('/data-wisata/hapus/{id_wisata}', [DatawisataController::class, 'hapus'])->name('hapus.index');
    Route::put('/nonaktif/{id_wisata}', [DatawisataController::class, 'nonaktif'])->name('nonaktif');
    Route::put('/wisataaktif/{id_wisata}', [DatawisataController::class, 'wisataaktif'])->name('wisataaktif');
    Route::pattern('id', '[0-9]+');
    Route::get('/detail-data-wisata/{id}', [DetaildatawisataController::class, 'showdetail']);

    //DATA REKENINGG
    // Route::get('/data-rekening', [DatarekeningController::class, 'index'])->name('data-rekening.index');
    // Route::post('/data-rekening', [DatarekeningController::class, 'store'])->name('Rekening.index');
    // Route::put('/data-rekening/update/{id_rekening}', [DatarekeningController::class, 'update'])->name('updateRekening.index');
    // Route::get('/data-rekening/hapus/{id_rekening}', [DatarekeningController::class, 'hapus'])->name('hapus.index');

    // DATA-ORDER
    Route::get('/data-order', [PemesananController::class, 'data_order'])->name('data-order.index');

    // STATUS PERJALANAN
    Route::get('/status-perjalanan', [PemesananController::class, 'status_perjalanan'])->name('status-perjalanan.index');
    Route::put('/berangkat/{id_pemesanan}', [PemesananController::class, 'berangkat'])->name('berangkat');
    Route::put('/selesai/{id_pemesanan}', [PemesananController::class, 'selesai'])->name('selesai');

    // PENDAPATAN
    Route::get('/pendapatan', [PendapatanController::class, 'index'])->name('pendapatan.index');
    Route::post('/tarik-saldo/{namaWisata}', [PendapatanController::class, 'tarikSaldo'])->name('tarik-saldo');

});


Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {

    //DATA WISATA
    Route::get('/data-wisata-admin', [DatawisataController::class, 'wisata_admin'])->name('data-wisata-admin.index');
    Route::pattern('id', '[0-9]+');
    Route::get('/detail-data-wisata-admin/{id}', [DetaildatawisataController::class, 'showdetailadmin']);

    //DATAUSER
    Route::get('/data-user', [DatauserController::class, 'index'])->name('data-user.index');
    Route::get('/request-mitra', [DatauserController::class, 'join_mitra'])->name('request-mitra.index');
    Route::get('/konfirmasi-mitra/{id}', [RequestmitraController::class, 'konfirmasiMitra']);
    Route::get('/cancel-mitra/{id}', [RequestmitraController::class, 'cencelMitra']);
    Route::get('/data-user/hapus_user/{id}', [DatauserController::class, 'hapus_user'])->name('hapus_user');

    //DATA kATERGORI
    Route::get('/data-kategori', [DatakategoriController::class, 'index'])->name('data-kategori.index');
    Route::post('/data-kategori', [DatakategoriController::class, 'store'])->name('Kategori.index');
    Route::put('/data-kategori/update/{id_kategori}', [DatakategoriController::class, 'update'])->name('updateKategori.index');
    Route::get('/data-kategori/hapus/{id_kategori}', [DatakategoriController::class, 'hapus'])->name('hapus.index');

    // DATA REKENING
    Route::get('/data-rekening-admin', [DatarekeningController::class, 'rekening_admin'])->name('data-rekening-admin.index');

    // DATA ORDER
    Route::get('/data-order-admin', [PemesananController::class, 'pemesanan_admin'])->name('data-order-admin.index');
    Route::put('/konfirmasi/{id_pemesanan}', [PemesananController::class, 'konfirmasi'])->name('konfirmasi');
    Route::put('/canceladmin/{id_pemesanan}', [PemesananController::class, 'canceladmin'])->name('canceladmin');


    // regist admin
    Route::post('/register_admin', [RegisterController::class, 'store_admin'])->name('register.store_admin');

    //DATA REKENINGG
    Route::get('/data-rekening', [DatarekeningController::class, 'index'])->name('data-rekening.index');
    Route::post('/data-rekening', [DatarekeningController::class, 'store'])->name('Rekening.index');
    Route::put('/data-rekening/update/{id_rekening}', [DatarekeningController::class, 'update'])->name('updateRekening.index');
    Route::get('/data-rekening/hapus/{id_rekening}', [DatarekeningController::class, 'hapus'])->name('hapus.index');

    // PENDAPATAN ADMIN
    Route::get('/pendapatan-admin', [PendapatanController::class, 'view_pendapatan'])->name('pendapatan-admin.index');
    Route::get('/pendapatan-biro-wisata', [PendapatanController::class, 'view_pendapatan_biro'])->name('pendapatan-biro-wisata.index');
    Route::post('/konfirmasi-tarik-saldo/{namaWisata}', [PendapatanController::class, 'konfirmasitarikSaldo'])->name('konfirmasi-tarik-saldo');
    Route::get('/canceltariksaldo/{id_pemesanan}', [PendapatanController::class, 'canceltarikSaldo'])->name('canceltarikSaldo');



});


Route::group(['middleware' => ['auth', 'ceklevel:admin,mitra']], function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // PROFILE
    Route::get('/profile', [DatauserController::class, 'profile'])->name('profile');

    // EDITPROFILE
    Route::post('/profile/update/{id}', [DatauserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-password/{id}', [DatauserController::class, 'updatePassword'])->name('profile.updatePassword');

    // ULASAN WISATA
    Route::get('/ulasan-wisata/{id}', [UlasanController::class, 'ulasan_wisata'])->name('ulasan-wisata');
    Route::get('/ulasan-wisata-admin/{id}', [UlasanController::class, 'ulasan_wisata_admin'])->name('ulasan-wisata-admin');
});


// DETAIL WISATA
Route::pattern('id', '[0-9]+');
Route::get('/{id}/{slug}', [DetailwisataController::class, 'show']);

//SEARCH RANGE TANGGAL
Route::get('/search_date', function (Request $request) {
    $startDate = $request->input('start-date');
    $endDate = $request->input('end-date');
    $kategori = kategori::all();
    $wisata = DB::table('wisata')
        ->join('users', 'users.id', '=', 'wisata.id_mitra')
        ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->select('wisata.*', 'kategori.nama_kategori as kategori', 'users.nama_lengkap as nama_lengkap')
        ->whereBetween('tanggalberangkat', [$startDate, $endDate])
        ->get();
    return view('landing.wisata', compact('wisata', 'kategori'));
})->name('wisata.search_date');

// SEARCH WISATA
Route::get('/search', [WisataController::class, 'search'])->name('wisata.search');
Route::get('/search_biro_wisata', [BirowisataController::class, 'search_biro_wisata'])->name('wisata.search_biro_wisata');

// PEMESANAN
Route::post('/boking', [PemesananController::class, 'store']);
Route::get('/invoice/{id_pemesanan}', [PemesananController::class, 'pdf']);
Route::put('/konfirmasi/{id_pemesanan}', [PemesananController::class, 'konfirmasi'])->name('konfirmasi');
Route::put('/cancel/{id_pemesanan}', [PemesananController::class, 'cancel'])->name('cancel');
Route::get('/data-order/hapus/{id}', [PemesananController::class, 'hapus'])->name('hapus.index');
Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
    Route::post('/upload-bukti_pembayaran/{id}', [PemesananController::class, 'update'])->name('upload-bukti_pembayaran');
});

// // MITRA
Route::get('/join-mitra', [RequestmitraController::class, 'tambah'])->name('join-mitra.index');
Route::post('/join-mitra', [RequestmitraController::class, 'store'])->name('Mitra.index');

// ResetPassword
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//LANDING
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/biro-wisata', [BirowisataController::class, 'index'])->name('biro-wisata.index');
Route::get('/biro_search', [BirowisataController::class, 'biro_search'])->name('biro_search');
Route::pattern('id', '[0-9]+');
Route::get('/detail-biro-wisata/{id}', [BirowisataController::class, 'showdetailbiro']);
Route::get('/pesanan-saya', [PemesananController::class, 'pesanan_saya'])->name('pesanan-saya.index');