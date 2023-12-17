<?php

namespace App\Http\Controllers\Landing;

use App\Models\wisata;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BirowisataController extends Controller
{
    public function index()
    {   
    	$users = DB::table('users')->get();
        return view('landing.biro-wisata',['users' => $users]);
    }


    // view data detail data wisata
    // public function showdetailbiro($id)
    // {      
    //     $detail_biro_wisata = DB::table('users')
    //     ->where('id', $id)
    //     ->first();
    //     return view('landing.detail-biro-wisata', compact('detail_biro_wisata'));
    // }
    public function showdetailbiro($id)
    {      
        // Mengambil detail biro wisata
        $detail_biro_wisata = DB::table('users')
            ->where('id', $id)
            ->first();

        // Mengambil daftar wisata yang dimiliki oleh mitra
        $wisata = DB::table('wisata')
            ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
            ->select('wisata.*', 'kategori.nama_kategori as kategori')
            ->get();

        return view('landing.detail-biro-wisata', compact('detail_biro_wisata', 'wisata'));
    }


}
