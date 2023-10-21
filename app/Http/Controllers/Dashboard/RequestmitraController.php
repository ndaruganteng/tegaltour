<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RequestmitraController extends Controller
{
    // mengambil data dari table mitra
    public function index()
    {   
    	$mitra = DB::table('mitra')->get();

        return view('dashboard.request-mitra',['mitra' => $mitra]);
    }
             
	// memanggil view form join mitra
    public function tambah()
    {
	    return view('landing.join-mitra');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama_lengkap' => 'required',
            'telepon' => 'required|regex:/^[0-9]{11,13}$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'bukti_mitra' => 'required|file|mimes:jpg,jpeg,png|max:2048', 
        ], 
        [
            "nama_lengkap.required" => "Harap masukkan Nama Lengkap",
            "telepon.required" => "Harap masukkan nomor telepon",
            "telepon.regex" => "Nomor telepon harus berisi hanya angka dan panjang 11-13 karakter",
            "email.required" => "Harap masukkan alamat email",
            "email.email" => "Format alamat email tidak valid",
            "email.unique" => "Alamat email sudah digunakan",
            "password.required" => "Harap masukkan kata sandi",
            "password.min" => "Kata sandi minimal harus 6 karakter",
            "password.regex" => "Kata sandi harus mengandung huruf besar, huruf kecil, angka, dan karakter khusus (@$!%*?&)",
            "bukti_mitra.required" => "Harap unggah bukti mitra",
            "bukti_mitra.file" => "Bukti mitra harus berupa berkas",
            "bukti_mitra.mimes" => "Format berkas yang diizinkan adalah jpeg dan png",
            "bukti_mitra.max" => "Ukuran berkas maksimum adalah 2 MB",
        ]);


        $mitra = new User;
        $namaMitra = $mitra->nama_lengkap= $request->input('nama_lengkap');
        $mitra->no_telepon= $request->input('telepon');
        $email = $mitra->email= $request->input('email');
        $alamat = $mitra->alamat= $request->input('alamat');
        $mitra->role= 'mitra';
        $password = $request->input('password');
        $mitra->password = bcrypt($password);
        if ($request->hasFile('bukti_mitra')) {
            $file = $request->file('bukti_mitra');
            $extension = $file->getClientOriginalExtension();
            $filename = $mitra->nama_lengkap. '_' . now()->timestamp . '.' . $extension;
            $file->storeAs('image/bukti-mitra/', $filename);
            $mitra->bukti_mitra = $filename;
        }
        $mitra->save();
        
        return redirect('/join-mitra')->with('message', 'Permintaan Join Mitra Anda telah Terkirim, Silahkan Cek Email! ');
    }

    // method untuk hapus data mitra
    public function hapus($id)
    {
        $mitra = Mitra::find($id);
        $mitra->delete();
        
        return back()->with('error', "Data berhasil dihapus!");
    }

    public function konfirmasiMitra($id)
    {
        $mitra = User::find($id);
        $mitra->status = 1; 
        $mitra->save();

        $email = $mitra->email;
        $namaMitra = $mitra->nama_lengkap;
      

        $details = [
            'email' => $email,
            'nama_lengkap' => $namaMitra,
        ];
       
        \Mail::to($email)->send(new Email($details));

        return redirect('/request-mitra')->with('success', "Mitra Telah Dikonfirmasi!");
    }

}
