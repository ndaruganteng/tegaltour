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
        $wisata = DB::table('wisata')->simplepaginate(6);
        return view('landing.wisata', ['wisata' => $wisata]);
    }

    
}
