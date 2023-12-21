<?php

namespace App\Http\Controllers\Landing;

use App\Models\wisata;
use App\Models\ulasan;
use App\Models\kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IndoTime;
use Carbon\Carbon;



class WisataController extends Controller
{
    // view data wisata
    // public function index()
    // {
    //     $kategori = kategori::all();
    //     $wisata = DB::table('wisata')
    //     ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
    //     ->join('users', 'users.id', '=', 'wisata.id_mitra')
    //     ->select('wisata.*', 
    //         'kategori.nama_kategori as kategori',
    //         'users.nama_lengkap as nama_lengkap',)
    //     ->inRandomOrder()->get();
 
    //     return view('landing.wisata', ['wisata' => $wisata],compact('kategori'));
    // }

    public function index()
    {
        $kategori = Kategori::all();
        $wisata = Wisata::join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
            ->join('users', 'users.id', '=', 'wisata.id_mitra')
            ->select('wisata.*', 
                'kategori.nama_kategori as kategori',
                'users.nama_lengkap as nama_lengkap')
            ->inRandomOrder()
            ->get();

        return view('landing.wisata', ['wisata' => $wisata], compact('wisata', 'kategori'));
    }

// search wisata
public function search(Request $request)
{
    $kategori = Kategori::all();
    $keyword = $request->input('search');

    // Gunakan model Wisata untuk membuat kueri
    $wisata = Wisata::join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->join('users', 'wisata.id_mitra', '=', 'users.id')
        ->select('wisata.*', 'kategori.nama_kategori as kategori','users.nama_lengkap as nama_lengkap')
        ->where('namawisata', 'LIKE', '%' . $keyword . '%')
        ->orWhere('tanggalberangkat', 'LIKE', '%' . $keyword . '%')
        ->orWhere('jamberangkat', 'LIKE', '%' . $keyword . '%')
        ->orWhere('kategori', 'LIKE', '%' . $keyword . '%')
        ->orWhere('harga', 'LIKE', '%' . $keyword . '%')
        ->orWhere('durasi', 'LIKE', '%' . $keyword . '%')
        ->orWhere('lokasi', 'LIKE', '%' . $keyword . '%')
        ->orWhere('fasilitas', 'LIKE', '%' . $keyword . '%')
        ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%')
        ->orWhere('nama_lengkap', 'LIKE', '%' . $keyword . '%')
        ->get();

    return view('landing.wisata', compact('wisata', 'kategori'));
}


    // search range tanggal
    public function search_date(Request $request)
    {
        $kategori = kategori::all();
        $keyword = $request->input('search_date');
        $wisata = DB::table('wisata')
        ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->select('wisata.*', 'kategori.nama_kategori as kategori')
        ->where('tanggalberangkat', 'LIKE', '%' . $keyword . '%')
        ->get();
        return view('landing.wisata',compact('wisata','kategori'));
    }
    
}