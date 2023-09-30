<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use App\Models\pemesanan; 
use App\Models\wisata;

class TransaksiController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        $pemesanan = DB::table('pemesanan')
        ->join('users', 'pemesanan.id_user', '=', 'users.id')
        ->join('wisata', 'pemesanan.id_wisata', '=', 'wisata.id_wisata')
        ->where('pemesanan.id_user', $userId)
        ->select(
            'pemesanan.id_pemesanan as id_pemesanan',
            'pemesanan.id_user',
            'users.nama_lengkap as nama_pengguna',
            'wisata.namawisata as nama_wisata',
            'wisata.image as image',
            'pemesanan.status as status',
            'pemesanan.status_perjalanan as status_perjalanan',
            'pemesanan.date as date',
            'pemesanan.harga_total as hargatotal',
            'pemesanan.bukti_pembayaran as bukti_pembayaran',
            'pemesanan.jumlah_orang as jumlah_orang',
            'wisata.harga as harga',
            'pemesanan.tanggal_berangkat as tanggal',
            'pemesanan.id_mitra as id_mitra'
        )
        ->get();
    
    $rekening = DB::table('rekening')
        ->join('pemesanan', 'rekening.id_mitra', '=', 'pemesanan.id_mitra')
        ->whereIn('pemesanan.id_pemesanan', $pemesanan->pluck('id_pemesanan')->toArray())
        ->select('rekening.*', 'pemesanan.id_pemesanan')
        ->get()
        ->groupBy('id_pemesanan');
    
        

        return view('landing.transaksi', ['rekening' => $rekening, 'pemesanan' => $pemesanan]);
    }
   
}
