<?php

namespace App\Http\Controllers\Landing;

use App\Models\wisata;
use App\Models\kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WisataController extends Controller
{
    // menampilkan data dari table wisata
    public function index()
    {
        $kategori = kategori::all();
        $wisata = DB::table('wisata')
        ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->select('wisata.*', 'kategori.nama_kategori as kategori')
        ->inRandomOrder()->get();
 
        return view('landing.wisata', ['wisata' => $wisata],compact('kategori'));
    }

    // search wisata
    public function search(Request $request)
    {
        $kategori = kategori::all();
        $keyword = $request->input('search');
        $wisata = DB::table('wisata')
            ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
            ->join('users', 'wisata.id_mitra', '=', 'users.id')
            ->select('wisata.*', 'kategori.nama_kategori as kategori','users.nama_lengkap as nama_lengkap')
            ->where('namawisata', 'LIKE', '%' . $keyword . '%')
            ->orWhere('tanggalberangkat', 'LIKE', '%' . $keyword . '%')
            ->orWhere('kategori', 'LIKE', '%' . $keyword . '%')
            ->orWhere('harga', 'LIKE', '%' . $keyword . '%')
            ->orWhere('durasi', 'LIKE', '%' . $keyword . '%')
            ->orWhere('lokasi', 'LIKE', '%' . $keyword . '%')
            ->orWhere('fasilitas', 'LIKE', '%' . $keyword . '%')
            ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nama_lengkap', 'LIKE', '%' . $keyword . '%')
            ->get();

            return view('landing.wisata',compact('wisata','kategori'));
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
