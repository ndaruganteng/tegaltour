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
    // view request mitra
    public function index()
    {
        $mitra = DB::table('mitra')->get();
        return view('dashboard.request-mitra', ['mitra' => $mitra]);
    }

    // view join mitra
    public function tambah()
    {
        return view('landing.join-mitra');
    }

    // fungsi register mitra
    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'nama_lengkap' => 'required|string',
                'profile_picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'telepon' => 'required|regex:/^[0-9]{11,13}$/',
                'rekening' => 'required',
                'email' => 'required|email|regex:/^[\w\.-]+@gmail\.com$/i|unique:users',
                'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
            [
                "nama_lengkap.required" => "Harap masukkan Nama Lengkap.",
                "telepon.required" => "Harap masukkan nomor telepon.",
                "rekening.required" => "Harap masukkan nomor Rekening.",
                "telepon.regex" => "Nomor telepon harus berisi hanya angka dan panjang 11-13 karakter.",
                "email.required" => "Harap masukkan alamat email.",
                "email.email" => "Format alamat email tidak valid.",
                "email.regex" => "Alamat email harus menggunakan domain @gmail.com.",
                "email.unique" => "Alamat email sudah digunakan.",
                "password.required" => "Harap masukkan kata sandi.",
                "password.min" => "Kata sandi minimal harus 6 karakter.",
                "password.regex" => "Kata sandi harus mengandung huruf besar, huruf kecil, angka, dan karakter khusus (@$!%*?&).",
                "profile_picture.image" => "File harus berupa gambar.",
                "profile_picture.mimes" => "Format file harus jpeg, png, jpg, atau gif.",
                "profile_picture.max" => "Ukuran file gambar tidak boleh melebihi 2 MB.",
            ]
        );

        $mitra = new User;
        $namaMitra = $mitra->nama_lengkap = $request->input('nama_lengkap');
        $mitra->no_telepon = $request->input('telepon');
        $email = $mitra->email = $request->input('email');
        $alamat = $mitra->alamat = $request->input('alamat');
        $rekening = $mitra->rekening = $request->input('rekening');
        $mitra->role = 'mitra';
        $password = $request->input('password');
        $mitra->password = bcrypt($password);
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->nama_lengkap . '_' . now()->timestamp . '.' . $extention;
            $file->storeAs('image/user/', $filename);
            $mitra->profile_picture = $filename;
        }
        $mitra->save();

        return redirect('/join-mitra')->with('message', 'Permintaan Join Mitra Anda telah Terkirim, Silahkan Cek Email! ');
    }

    // fungsi hapus data mitra
    public function hapus($id)
    {
        $mitra = Mitra::find($id);
        $mitra->delete();

        return back()->with('toast_success', "Data berhasil dihapus!");
    }

    // fungsi konfirmasi mitra
    public function konfirmasiMitra($id)
    {
        $mitra = User::find($id);
        $mitra->status = 1;
        $mitra->save();

        $email = $mitra->email;
        $namaMitra = $mitra->nama_lengkap;
        $alamat = $mitra->alamat;


        $details = [
            'email' => $email,
            'nama_lengkap' => $namaMitra,
            'alamat' => $alamat,
        ];

        \Mail::to($email)->send(new Email($details));

        return redirect('/request-mitra')->with('toast_success', "Mitra Telah Dikonfirmasi!");
    }

    // fungsi cancel mitra
    public function cencelMitra($id)
    {
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

        return redirect('/request-mitra')->with('toast_success', "Mitra Telah Cancel!");
    }
}