<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\carbon;
use App\Models\pemesanan; 
use App\Models\wisata; 

class HistoryController extends Controller
{
    public function history_user()
    {
        {
            $usersId = Auth::user()->id;
            $pemesanan = DB::table('pemesanan')
                ->join('users', 'pemesanan.id_user', '=', 'users.id')
                ->join('wisata', 'pemesanan.id_wisata', '=', 'wisata.id_wisata')
                ->where('pemesanan.id_user', $usersId) 
                ->where('pemesanan.status', '3')
                ->select('pemesanan.id_pemesanan as id_pemesanan','pemesanan.id_user', 'users.nama_lengkap as nama_pengguna', 'wisata.namawisata as nama_wisata','wisata.image as image',
                'pemesanan.status as status','pemesanan.status_perjalanan as status_perjalanan','pemesanan.date as date','pemesanan.harga_total as hargatotal','pemesanan.bukti_pembayaran as bukti_pembayaran','pemesanan.jumlah_orang as jumlah_orang', 'wisata.harga as harga','pemesanan.tanggal_berangkat as tanggal')
                ->get();       
            return view('landing.history', ['pemesanan' => $pemesanan]);
        }
    }
}
