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
        $wisata = DB::table('wisata')->simplePaginate(4);
        $promotion = DB::table('promotion')->get();
        return view('landing.home', ['wisata' => $wisata, 'promotion' => $promotion]);
    }

        public function penilaian()
    {
        return view('landing.form-penilaian');
    }

}
