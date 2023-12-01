<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DetaildatawisataController extends Controller
{
    // view data detail data wisata
    public function showdetail($id)
    {      
        $data_wisata_detail = DB::table('wisata')
        ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->select('wisata.*', 'kategori.nama_kategori as kategori')
        ->where('id_wisata', $id)
        ->first();
        return view('dashboard.detail-data-wisata', compact('data_wisata_detail'));
    }

    // view data detail wisata admin
    public function showdetailadmin($id)
    {      
        $detail_data_wisata_admin = DB::table('wisata')
        ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->select('wisata.*', 'kategori.nama_kategori as kategori')
        ->where('id_wisata', $id)
        ->first();
        
        return view('dashboard.detail-data-wisata-admin', compact('detail_data_wisata_admin'));
    }  

}
