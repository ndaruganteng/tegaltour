<?php

namespace App\Http\Controllers\Landing;

use App\Models\wisata;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WisataController extends Controller
{
    // menampilkan data dari table wisata
    public function index()
    {
        $wisata = DB::table('wisata')->inRandomOrder()->get();
        return view('landing.wisata', ['wisata' => $wisata]);
    }

    // search wisata
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $wisata = wisata::where('namawisata', 'LIKE', '%' . $keyword . '%')
            ->orWhere('tanggalberangkat','LIKE', '%' . $keyword . '%')
            ->orWhere('kategori', 'LIKE', '%' . $keyword . '%')
            ->orWhere('harga', 'LIKE', '%' . $keyword . '%')
            ->orWhere('durasi', 'LIKE', '%' . $keyword . '%')
            ->orWhere('lokasi', 'LIKE', '%' . $keyword . '%')
            ->orWhere('fasilitas', 'LIKE', '%' . $keyword . '%')
            ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%')
            ->get();

            return view('landing.wisata',compact('wisata'));
    }

    // search range tanggal
    public function search_date(Request $request)
    {
        $keyword = $request->input('search_date');
        $wisata = wisata::where('tanggalberangkat', 'LIKE', '%' . $keyword . '%')
            ->get();

            return view('landing.wisata',compact('wisata'));
    }

    
}
