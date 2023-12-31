<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\wisata;
use App\Models\User;
use App\Models\mitra;
use App\Models\rekening;
use App\Models\pemesanan;

class DashboardController extends Controller
{
    // view dashboard
    public function index()
    {   
        $mitraId = Auth::user()->id;
        $totalwisataadmin = DB::table('wisata')->count();
        $totalUsers = DB::table('users')->count();
        $totalRekeningadmin = DB::table('rekening')->count();
        $totalKategori = DB::table('kategori')->count();
        $totalPesananadmin = DB::table('pemesanan')->count();
        $totalStatusperjalan = DB::table('pemesanan')
        ->where('status', 2)
        ->where('id_mitra', $mitraId)
        ->count();
        $totalRequestmitra = DB::table('users')
        ->where('status', null)
        ->count();
        $totalRekening = DB::table('rekening')
        ->count();
        $totalWisata = DB::table('wisata')
        ->where('id_mitra', $mitraId)
        ->count();
        $totalOrder = DB::table('pemesanan')
        ->where('id_mitra', $mitraId)
        ->where('status', 3)
        ->count();
        $totalOrdermasuk = DB::table('pemesanan')
        ->where('id_mitra', $mitraId)
        ->where('status', 2)
        ->count();
        $destinasi = Wisata::select('wisata.namawisata', 
        'pemesanan.id_mitra',
        'mitra.nama_lengkap as nama_lengkap',
            DB::raw('COUNT(pemesanan.id_pemesanan) as total_pemesan'), 
            DB::raw('SUM(pemesanan.harga_total) as total_harga'),
            DB::raw('SUM(pemesanan.harga_total * 0.9) as total_harga_potong'),
            DB::raw('(SUM(pemesanan.harga_total) - SUM(pemesanan.harga_total * 0.9)) as potongan'))
        ->join('pemesanan', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
        ->join('users as mitra', 'pemesanan.id_mitra', '=', 'mitra.id')
        ->whereIn('pemesanan.status', [2, 3]) 
        ->groupBy('wisata.id_wisata', 'wisata.namawisata', 'pemesanan.id_mitra', 'mitra.nama_lengkap')
        ->get();
        $totalPotongan = $destinasi->sum('potongan');
        
        $destinasi = Wisata::select(
            'wisata.namawisata',
            DB::raw('COUNT(pemesanan.id_pemesanan) as total_pemesan'),
            DB::raw('SUM(pemesanan.harga_total) as total_harga'),
            DB::raw('SUM(pemesanan.harga_total * 0.9) as total_harga_potong')
        )
            ->leftJoin('pemesanan', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
            ->where('pemesanan.id_mitra', $mitraId)
            ->whereIn('pemesanan.status_pendapatan', [NULL, 1])
            ->where('pemesanan.status_perjalanan', 3)
            ->groupBy('wisata.id_wisata', 'wisata.namawisata')
            ->get();
        
        $totalHargaPotong = $destinasi->sum('total_harga_potong');
        

        return view('dashboard.dashboard',
        compact('totalWisata',
        'totalUsers',
        'totalwisataadmin',
        'totalRekening',
        'totalOrder',
        'totalRekeningadmin',
        'totalKategori',
        'totalPesananadmin',
        'totalRequestmitra',
        'totalOrdermasuk',
        'totalStatusperjalan',
        'totalPotongan',
        'totalHargaPotong'
        ));
    }


}