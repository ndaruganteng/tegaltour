<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\pemesanan; // Ganti "Pemesanan" dengan huruf kapital
use App\Models\wisata; // Ganti "Wisata" dengan huruf kapital
use Illuminate\Support\Facades\File; // Import class File

class TransaksiController extends Controller
{
    public function index()
    {
        $rekening = DB::table('rekening')->get();
        $pemesanan = DB::table('pemesanan')->simplepaginate(5);
        return view('landing.transaksi', ['rekening' => $rekening, 'pemesanan' => $pemesanan]);
    }
}
