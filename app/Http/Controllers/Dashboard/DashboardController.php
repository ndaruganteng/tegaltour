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
    public function index()
    {   
        $mitraId = Auth::user()->id;
        $totalUsers = DB::table('users')->count();
        $totalMitra = DB::table('mitra')->count();
        $totalRekening = DB::table('rekening')
        ->where('id_mitra', $mitraId)
        ->count();
        $totalWisata = DB::table('wisata')
        ->where('id_mitra', $mitraId)
        ->count();
        $totalOrder = DB::table('pemesanan')
        ->where('id_mitra', $mitraId)
        ->count();

        return view('dashboard.dashboard',compact('totalWisata','totalUsers','totalMitra','totalRekening','totalOrder'));
    }



}
