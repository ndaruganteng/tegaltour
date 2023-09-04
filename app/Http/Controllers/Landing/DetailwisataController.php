<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailwisataController extends Controller
{   
    // menampilkan data detail-wisata
    public function show($id)
    {      
        $detail_wisata = wisata::findOrFail($id);
        return view('landing.detail-wisata', compact('detail_wisata'));
    }   
}
