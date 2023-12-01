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
            'rating' => 'required|integer|between:1,5',
        ], 
        [
            "komentar.required" => "Please enter komentar ",
            "rating.required" => "Please enter rating ",
        ]);

        $ulasan = new Ulasan;
        $ulasan->id_user = $request->input('id_user');
        $ulasan->id_wisata= $request->input('id_wisata');
        $id = $request->input('id_pemesanan');
        $ulasan->komentar= $request->input('komentar');
        $ulasan->rating= $request->input('rating');
        $ulasan['date']= Carbon::now($request->date);

        $ulasan->save();

        $updateStatus = DB::table('pemesanan')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 3
            ]);

        return redirect('/pesanan-saya') -> with('success', "Ulasan Anda Telah Terkirim!");
    }

    // view Ulasan Wisata Biro
    public function ulasan_wisata($id)
    {

        $ulasan = DB::table('ulasan')
        ->join('users', 'ulasan.id_user', '=', 'users.id')
        ->select('ulasan.*', 'users.nama_lengkap as nama', 'users.profile_picture as profile_picture')
        ->where('id_wisata', $id)
        ->get();
        return view('dashboard.ulasan-wisata', compact('ulasan'));
    }
}
