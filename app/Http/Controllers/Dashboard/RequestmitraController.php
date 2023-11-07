<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Mail\Email;
use App\Mail\cencelMail;
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
            'email' => 'required|email|regex:/^[\w\.-]+@gmail\.com$/i|unique:users',
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ], 
        [
            "nama_lengkap.required" => "Harap masukkan Nama Lengkap",
            "telepon.required" => "Harap masukkan nomor telepon",
            "telepon.regex" => "Nomor telepon harus berisi hanya angka dan panjang 11-13 karakter",
            "email.required" => "Harap masukkan alamat email",
            "email.email" => "Format alamat email tidak valid",
            "email.regex" => "Alamat email harus menggunakan domain @gmail.com",
            "email.unique" => "Alamat email sudah digunakan",
            "password.required" => "Harap masukkan kata sandi",
            "password.min" => "Kata sandi minimal harus 6 karakter",
            "password.regex" => "Kata sandi harus mengandung huruf besar, huruf kecil, angka, dan karakter khusus (@$!%*?&)",
        ]);


        $mitra = new User;
        $namaMitra = $mitra->nama_lengkap= $request->input('nama_lengkap');
        $mitra->no_telepon= $request->input('telepon');
        $email = $mitra->email= $request->input('email');
        $alamat = $mitra->alamat= $request->input('alamat');
        $mitra->role= 'mitra';
        $password = $request->input('password');
        $mitra->password = bcrypt($password);
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

    public function cencelMitra($id){
        $mitra = User::find($id);
        $mitra->status = 3;
        $mitra->save();

        $namaMitra = $mitra->nama_lengkap;
        $email = $mitra->email;

        $data = [
            'email' => $email,
            'nama_lengkap' => $namaMitra,
        ];
       
        \Mail::to($email)->send(new cencelMail($data));

        return redirect('/request-mitra')->with('error', "Mitra Telah Cancel!");

    }

}
