<?php

namespace App\Http\Controllers\Landing;

use App\Models\kategori;
use App\Models\wisata;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BirowisataController extends Controller
{
    public function index()
    {   
    	$users = DB::table('users')->get();
        return view('landing.biro-wisata',['users' => $users]);
    }


    // public function showdetailbiro($id)
    // {      
    //     $detail_biro_wisata = DB::table('users')
    //         ->where('id', $id)
    //         ->first();
            
    //     $wisata = DB::table('wisata')
    //         ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
    //         ->join('users', 'users.id', '=', 'wisata.id_mitra')
    //         ->where('wisata.id_mitra', $id)
    //         ->select('wisata.*', 
    //             'kategori.nama_kategori as kategori',
    //             'users.nama_lengkap as nama_lengkap',)
    //         ->get();
    
    //     return view('landing.detail-biro-wisata', compact('detail_biro_wisata', 'wisata'));
    // }

    public function showdetailbiro($id)
    {      
        $detail_biro_wisata = DB::table('users')
            ->where('id', $id)
            ->first();
            
        $wisata = Wisata::join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
            ->join('users', 'users.id', '=', 'wisata.id_mitra')
            ->where('wisata.id_mitra', $id)
            ->select('wisata.*', 
                'kategori.nama_kategori as kategori',
                'users.nama_lengkap as nama_lengkap',)
            ->get();

        return view('landing.detail-biro-wisata', compact('detail_biro_wisata', 'wisata'));
    }


    public function biro_search(Request $request)
    {
        $search = $request->input('search');
        
        $users = DB::table('users')
            ->where('nama_lengkap', 'like', '%' . $search . '%')
            ->get();

        return view('landing.biro-wisata', ['users' => $users, 'search' => $search]);
    }



        // search wisata
        // public function search_biro_wisata(Request $request)
        // {
        //     $kategori = kategori::all();
        //     $keyword = $request->input('search_biro_wisata');
        //     $detail_biro_wisata = wisata::find(1);    
        //     $wisata = DB::table('wisata')
        //         ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        //         ->join('users', 'wisata.id_mitra', '=', 'users.id')
        //         ->select('wisata.*', 'kategori.nama_kategori as kategori', 'users.nama_lengkap as nama_lengkap')
        //         ->where(function ($query) use ($keyword) {
        //             $query->where('namawisata', 'LIKE', '%' . $keyword . '%')
        //                 ->orWhere('tanggalberangkat', 'LIKE', '%' . $keyword . '%')
        //                 ->orWhere('jamberangkat', 'LIKE', '%' . $keyword . '%')
        //                 ->orWhere('kategori', 'LIKE', '%' . $keyword . '%')
        //                 ->orWhere('harga', 'LIKE', '%' . $keyword . '%')
        //                 ->orWhere('durasi', 'LIKE', '%' . $keyword . '%')
        //                 ->orWhere('lokasi', 'LIKE', '%' . $keyword . '%')
        //                 ->orWhere('fasilitas', 'LIKE', '%' . $keyword . '%')
        //                 ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%')
        //                 ->orWhere('nama_lengkap', 'LIKE', '%' . $keyword . '%');
        //         })
        //         ->get();
        
        //     return view('landing.detail-biro-wisata', compact('wisata', 'detail_biro_wisata', 'kategori'));
        // }

}