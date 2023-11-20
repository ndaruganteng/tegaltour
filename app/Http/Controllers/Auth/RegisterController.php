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
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'nama_lengkap' => ['required'],
            'no_telepon' => ['required'],
            
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
            $user->status = 1;
            $user->role = ($request->input('role') === 'user') ? 'user' : 'user';
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

            return redirect()->route('login.index')->with('success', "Akun berhasil dibuat");
        }
    }

    
}
