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

    
    
     

}
