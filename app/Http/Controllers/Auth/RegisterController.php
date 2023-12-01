<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RegisterController extends Controller
{
    // view register
    public function index()
    {
        return view('auth.register');
    }

    // fungsi register user
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:6', 'confirmed'],
    //         'nama_lengkap' => ['required'],
    //         'no_telepon' => ['required'],
            
    //     ]);
        
    //     $existingUser = User::where('email', $request->input('email'))->first();
    //     $email = $request->input('email');
    //     $Domain = explode('@', $email);
    
    //     if ($existingUser) {
    //         alert()->error('Gagal', 'Email sudah digunakan');
    //         return redirect()->back()->withInput();
    //     } else if (!checkdnsrr($Domain[1],"MX")){
    //         alert()->error('Gagal', 'Domain email tidak ditemukan');
    //         return redirect()->back()->withInput();
    //     } else{
    //         alert()->success('Berhasil', 'Akun berhasil dibuat');
    //         $user = new User();
    //         $user->nama_lengkap = $request->input('nama_lengkap');
    //         $user->email = $request->input('email');
    //         $user->status = 1;
    //         $user->role = ($request->input('role') === 'user') ? 'user' : 'user';
    //         $password = $request->input('password');
    //         $errors = [];
    //         if (!preg_match('/[a-z]/', $password)) {
    //             $errors[] = 'Password harus mengandung setidaknya satu huruf kecil.';
    //         }
    //         if (!preg_match('/[A-Z]/', $password)) {
    //             $errors[] = 'Password harus mengandung setidaknya satu huruf besar.';
    //         }
    //         if (!preg_match('/\d/', $password)) {
    //             $errors[] = 'Password harus mengandung setidaknya satu angka.';
    //         }
    //         if (empty($errors)) {
    //             $hashedPassword = bcrypt($password);
    //             $user->password = $hashedPassword;
    //         } else {
    //             foreach ($errors as $error) {
    //                 alert()->error('Gagal', $error);
    //             }
    //             return redirect()->back()->withInput();
    //         }

    //         $phone = $request->input('no_telepon');
    //         if (!preg_match('/^\d{11,13}$/', $phone)) {
    //             alert()->error('Gagal', 'Nomor telepon harus terdiri dari 11 sampai 13 digit angka.');
    //             return redirect()->back()->withInput();
    //         } else {
    //             $user->no_telepon = $phone;
    //         }
    //         $user->save();

    //         return redirect()->route('login.index')->with('success', "Akun berhasil dibuat");
    //     }
    // }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'nama_lengkap' => ['required'],
            'no_telepon' => ['required', 'numeric', 'digits_between:11,13', 'unique:users'],
            'profile_picture' => ['required', 'image', 'max:2048', 'mimes:jpeg,png,jpg'],
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'email' => 'Format :attribute tidak valid.',
            'max' => [
                'numeric' => ':attribute tidak boleh lebih dari :max.',
                'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
                'string' => ':attribute tidak boleh lebih dari :max karakter.',
                'array' => ':attribute tidak boleh lebih dari :max item.',
            ],
            'unique' => ':attribute sudah digunakan.',
            'confirmed' => 'Konfirmasi :attribute tidak cocok.',
            'min' => [
                'numeric' => ':attribute harus setidaknya :min.',
                'string' => ':attribute harus setidaknya :min karakter.',
            ],
            'digits_between' => ':attribute harus terdiri dari 11 sampai 13 digit.',
            'numeric' => ':attribute harus berupa angka.',
            'profile_picture.required' => 'Kolom foto profil harus diisi.',
            'profile_picture.image' => 'File harus berupa gambar.',
            'profile_picture.max' => 'Ukuran file gambar tidak boleh lebih dari 2MB.',
            'profile_picture.mimes' => 'Format file gambar harus jpeg, png, atau jpg.',
        ]);

        $existingUser = User::where('email', $request->input('email'))->first();
        $email = $request->input('email');
        $Domain = explode('@', $email);

        if ($existingUser) {
            alert()->error('Gagal', 'Email sudah digunakan');
            return redirect()->back()->withInput();
        } elseif (!checkdnsrr($Domain[1], "MX")) {
            alert()->error('Gagal', 'Domain email tidak ditemukan');
            return redirect()->back()->withInput();
        } else {
            $existingPhone = User::where('no_telepon', $request->input('no_telepon'))->first();
            if ($existingPhone) {
                alert()->error('Gagal', 'Nomor telepon sudah digunakan');
                return redirect()->back()->withInput();
            }

            alert()->success('Berhasil', 'Akun berhasil dibuat');
            $user = new User();
            $user->nama_lengkap = $request->input('nama_lengkap');
            $user->email = $request->input('email');
            $user->status = 1;
            $user->role = ($request->input('role') === 'user') ? 'user' : 'user';
            if($request->hasFile('profile_picture')){
                $file = $request->file('profile_picture');
                $extention = $file->getClientOriginalExtension();
                $filename = $request->nama_lengkap.'_'.now()->timestamp.'.'.$extention;
                $file->storeAs('image/user/',$filename);
                $user->profile_picture = $filename;
            }
            $password = $request->input('password');
            $errors = [];

            if (!preg_match('/[a-z]/', $password)) {
                $errors[] = 'Password harus mengandung setidaknya satu huruf kecil.';
            }
            if (!preg_match('/[A-Z]/', $password)) {
                $errors[] = 'Password harus mengandung setidaknya satu huruf besar.';
            }
            if (!preg_match('/\d/', $password)) {
                $errors[] = 'Password harus mengandung setidaknya satu angka.';
            }

            if (empty($errors)) {
                $hashedPassword = bcrypt($password);
                $user->password = $hashedPassword;
            } else {
                foreach ($errors as $error) {
                    alert()->error('Gagal', $error);
                }
                return redirect()->back()->withInput();
            }

            $phone = $request->input('no_telepon');
            $user->no_telepon = $phone;

            $user->save();

            return redirect()->route('login.index')->with('success', "Akun berhasil dibuat");
        }
    }

    // fungsi register admin
    public function store_admin(Request $request)
    {
        $validator = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profile_picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'nama_lengkap' => ['required', 'string'],
            'no_telepon' => ['required', 'string'],
        ], 
        [
            'email.required' => 'Harap masukkan alamat email.',
            'email.string' => 'Format alamat email tidak valid.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.max' => 'Alamat email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Alamat email sudah digunakan.',
            
            'profile_picture.image' => 'File harus berupa gambar.',
            'profile_picture.mimes' => 'Format file harus jpeg, png, jpg, atau gif.',
            'profile_picture.max' => 'Ukuran file gambar tidak boleh melebihi 2 MB.',
            
            'alamat.required' => 'Harap masukkan alamat.',
            'alamat.string' => 'Format alamat tidak valid.',
            
            'password.required' => 'Harap masukkan kata sandi.',
            'password.string' => 'Format kata sandi tidak valid.',
            'password.min' => 'Kata sandi minimal harus :min karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            
            'nama_lengkap.required' => 'Harap masukkan Nama Lengkap.',
            'nama_lengkap.string' => 'Format Nama Lengkap tidak valid.',
            
            'no_telepon.required' => 'Harap masukkan nomor telepon.',
            'no_telepon.string' => 'Format nomor telepon tidak valid.',
        ]);
        
        $existingUser = User::where('email', $request->input('email'))->first();
        $email = $request->input('email');
        $Domain = explode('@', $email);
    
        if ($existingUser) {
            alert()->error('Gagal', 'Email sudah digunakan');
            return redirect()->back()->withInput();
        } else if (!checkdnsrr($Domain[1],"MX")){
            alert()->error('Gagal', 'Domain email tidak ditemukan');
            return redirect()->back()->withInput();
        } else{
            alert()->success('Berhasil', 'Akun berhasil dibuat');
            $user = new User();
            $user->nama_lengkap = $request->input('nama_lengkap');
            $user->email = $request->input('email');
            $user->alamat = $request->input('alamat');
            $user->status = 1;
            $user->role = ($request->input('role') === 'admin') ? 'admin' : 'admin';
            if($request->hasFile('profile_picture')){
                $file = $request->file('profile_picture');
                $extention = $file->getClientOriginalExtension();
                $filename = $request->nama_lengkap.'_'.now()->timestamp.'.'.$extention;
                $file->storeAs('image/user/',$filename);
                $user->profile_picture = $filename;
            }
            $password = $request->input('password');
            $errors = [];
            if (!preg_match('/[a-z]/', $password)) {
                $errors[] = 'Password harus mengandung setidaknya satu huruf kecil.';
            }
            if (!preg_match('/[A-Z]/', $password)) {
                $errors[] = 'Password harus mengandung setidaknya satu huruf besar.';
            }
            if (!preg_match('/\d/', $password)) {
                $errors[] = 'Password harus mengandung setidaknya satu angka.';
            }
            if (empty($errors)) {
                $hashedPassword = bcrypt($password);
                $user->password = $hashedPassword;
            } else {
                foreach ($errors as $error) {
                    alert()->error('Gagal', $error);
                }
                return redirect()->back()->withInput();
            }

            $phone = $request->input('no_telepon');
            if (!preg_match('/^\d{11,13}$/', $phone)) {
                alert()->error('Gagal', 'Nomor telepon harus terdiri dari 11 sampai 13 digit angka.');
                return redirect()->back()->withInput();
            } else {
                $user->no_telepon = $phone;
            }
            $user->save();

            return redirect()->route('data-user.index')->with('success', "Akun berhasil dibuat");
        }
    }
}
