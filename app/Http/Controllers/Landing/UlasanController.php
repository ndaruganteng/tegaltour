<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\ulasan;
use App\Models\wisata;

class UlasanController extends Controller
{

    // view form ulasa
    public function tambah()
    {
        return view('landing.pesanan-saya');
    }

    // fungsi ulasan
    public function store(Request $request)
    {
        $validator = $request -> validate([
            'komentar' => 'required|string|max:900',
            'komentar_wisata' => 'required|string|max:900',
            'rating' => 'required|integer|between:1,5',
        ], 
        [
            "komentar.required" => "Ulasan harus di isi",
            "komentar_wisata.required" => "Ulasan harus di isi",
            "rating.required" => "Rating harus di isi",
        ]);

        $ulasan = new Ulasan;
        $ulasan->id_user = $request->input('id_user');
        $ulasan->id_wisata= $request->input('id_wisata');
        $id = $request->input('id_pemesanan');
        $ulasan->komentar= $request->input('komentar');
        $ulasan->komentar_wisata= $request->input('komentar_wisata');
        $ulasan->rating= $request->input('rating');
        $ulasan['date']= Carbon::now($request->date);

        $ulasan->save();

        $updateStatus = DB::table('pemesanan')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 3
            ]);

        return redirect('/pesanan-saya') -> with('toast_success', "Ulasan Anda Telah Terkirim!");
    }

    // view Ulasan Wisata Biro
    // public function ulasan_wisata($id)
    // {
    //     $ulasan = DB::table('ulasan')
    //     ->join('users', 'ulasan.id_user', '=', 'users.id')
    //     ->select('ulasan.*', 'users.nama_lengkap as nama', 'users.profile_picture as profile_picture')
    //     ->where('id_wisata', $id)
    //     ->get();
    //     return view('dashboard.ulasan-wisata', compact('ulasan'));
    // }
    // public function ulasan_wisata($id)
    // {
    //     // Ambil data wisata berdasarkan ID
    //     $wisata = Wisata::findOrFail($id);

    //     // Ambil ulasan berdasarkan ID wisata
    //     $ulasan = $wisata->ulasan()
    //         ->join('users', 'ulasan.id_user', '=', 'users.id')
    //         ->select('ulasan.*', 'users.nama_lengkap as nama', 'users.profile_picture as profile_picture')
    //         ->get();

    //     // Ambil nilai rata-rata rating
    //     $averageRating = $wisata->getAverageRating();

    //     return view('dashboard.ulasan-wisata', compact('ulasan', 'averageRating'));
    // }

    public function ulasan_wisata($id)
{
    // Ambil data wisata berdasarkan ID
    $wisata = Wisata::findOrFail($id);

    // Ambil ulasan berdasarkan ID wisata
    $ulasan = $wisata->ulasan()
        ->join('users', 'ulasan.id_user', '=', 'users.id')
        ->select('ulasan.*', 'users.nama_lengkap as nama', 'users.profile_picture as profile_picture')
        ->get();

    // Ambil nilai rata-rata rating
    $averageRating = $wisata->getAverageRating();

    return view('dashboard.ulasan-wisata', compact('ulasan', 'averageRating'));
}



    public function ulasan_wisata_admin($id)
    {
        // Ambil data wisata berdasarkan ID
        $wisata = Wisata::findOrFail($id);

        // Ambil ulasan berdasarkan ID wisata
        $ulasan = $wisata->ulasan()
            ->join('users', 'ulasan.id_user', '=', 'users.id')
            ->select('ulasan.*', 'users.nama_lengkap as nama', 'users.profile_picture as profile_picture')
            ->get();

        // Ambil nilai rata-rata rating
        $averageRating = $wisata->getAverageRating();

        return view('dashboard.ulasan-wisata-admin', compact('ulasan', 'averageRating'));
    }
}