<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class DatauserController extends Controller
{
    public function index()
    {   
    	$users = DB::table('users')->get();
        return view('dashboard.data-user',['users' => $users]);
    }

    // join mitra
    public function join_mitra()
    {   
    	$users = DB::table('users')
        ->where('status', null)
        ->get();

        return view('dashboard.request-mitra',['users' => $users]);
    }

    // fungsi hapus user
    public function hapus_user($id)
    {
        // Cari pengguna berdasarkan ID
        $user = User::find($id);
    
        // Periksa apakah pengguna ditemukan
        if ($user) {
            // Hapus pengguna
            $user->delete();
            
            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return back()->with('success', 'Pengguna berhasil dihapus.');
        } else {
            // Jika pengguna tidak ditemukan, berikan pesan error
            return back()->with('error', 'Pengguna tidak ditemukan.');
        }
    }


}
