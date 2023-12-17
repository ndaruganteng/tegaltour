<?php

namespace App\Http\Controllers\Landing;

use App\Models\wisata;
use App\Models\User;
use App\Models\promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    // view home
    public function index()
    {
        $wisata = DB::table('wisata')
        ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->join('users', 'users.id', '=', 'wisata.id_mitra')
        ->select('wisata.*', 
        'kategori.nama_kategori as kategori',
        'users.nama_lengkap as namamitra',)
        ->inRandomOrder()->simplePaginate(4);
        return view('landing.home', ['wisata' => $wisata]);
    }

    // PROFILE USER
    public function profile_user()
    {
        $user = auth()->user();
        return view('landing.profile-user', compact('user'));
    }

    // UPDATE PROFIL USER
    public function updateprofileUser(Request $request, $id)
    {
        $user = User::find($id);
    
        $request->validate([
            'nama_lengkap' => ['required'],
            'no_telepon' => ['required', 'numeric', 'digits_between:11,13'],
            'profile_picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka.',
            'digits_between' => ':attribute harus terdiri dari 11 sampai 13 digit.',
            'image' => 'Berkas :attribute harus berupa gambar.',
            'mimes' => 'Berkas :attribute harus memiliki format jpeg, png, jpg, atau gif.',
            'max' => 'Ukuran berkas :attribute tidak boleh lebih dari 2 MB.',
        ]);
    
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->no_telepon = $request->input('no_telepon');
        $user->alamat = $request->input('alamat');
    
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete('image/user/' . $user->profile_picture);
            }
            
            $filename = str_replace(' ', '_', $user->nama_lengkap) . '_' . now()->timestamp . '.' . $request->file('profile_picture')->getClientOriginalExtension();
    
            $request->file('profile_picture')->storeAs('image/user/', $filename, 'public');
            $user->profile_picture = $filename;
        }
    
        $user->save();
    
        return redirect()->route('profile_user')->with('toast_success', 'Profil berhasil diperbarui.');
    }
}
