<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DetaildatawisataController extends Controller
{
    // menampilkan data detail-data-wisata
    public function showdetail($id)
    {      
        $data_wisata_detail = wisata::findOrFail($id);
        return view('dashboard.detail-data-wisata', compact('data_wisata_detail'));
    }


    // detail data wisata admin
    public function showdetailadmin($id)
    {      
        $detail_data_wisata_admin = wisata::findOrFail($id);
        return view('dashboard.detail-data-wisata-admin', compact('detail_data_wisata_admin'));
    }

    
    
     

}
