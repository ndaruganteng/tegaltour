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
        ->where('id_mitra', $mitraId)
        ->count();
        $totalWisata = DB::table('wisata')
        ->where('id_mitra', $mitraId)
        ->count();
        $totalOrder = DB::table('pemesanan')
        ->where('id_mitra', $mitraId)
        ->count();

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
            'totalStatusperjalan'
        ));
    }

}
