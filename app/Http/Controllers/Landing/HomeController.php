<?php

namespace App\Http\Controllers\Landing;

use App\Models\wisata;
use App\Models\promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $wisata = DB::table('wisata')
        ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->select('wisata.*', 'kategori.nama_kategori as kategori')
        ->inRandomOrder()->simplePaginate(4);
        return view('landing.home', ['wisata' => $wisata]);
    }


}
