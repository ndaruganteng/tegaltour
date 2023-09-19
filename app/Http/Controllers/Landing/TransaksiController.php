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
        $idUsers = Auth()->user()->nama_lengkap;
        $rekening = DB::table('rekening')->get();
        $pemesanan = DB::table('pemesanan')->where('namauser', '=', $idUsers)->get();
        // $pemesanan = pemesanan::where('namauser', '=', $idUsers)->with('wisata')->get();
        // $pemesanan = DB::table('pemesanan')
        // ->select('pemesanan.*', 'wisata.image')
        // ->rightJoin('wisata','pemesanan.namawisata','=','wisata.namawisata')
        // ->rightJoin('users','pemesanan.namauser','=','users.nama_lengkap')
        // ->where('pemesanan.namauser','=','users.nama_lengkap')
        // ->get();

        return view('landing.transaksi', ['rekening' => $rekening, 'pemesanan' => $pemesanan]);
    }
   
}
