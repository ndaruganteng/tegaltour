<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wisata;
use App\Models\ulasan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DetailwisataController extends Controller
{   
    // menampilkan data detail-wisata
    public function show($id)
    {      
        $detail_wisata = wisata::findOrFail($id);
        $ulasan = DB::table('ulasan')
        ->join('users', 'ulasan.id_user', '=', 'users.id')
        ->select('ulasan.*', 'users.nama_lengkap as nama')
        ->where('id_wisata', $id)
        ->get();

        return view('landing.detail-wisata', compact('detail_wisata','ulasan'));
    }   
}
