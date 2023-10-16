<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{


    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $data = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($data)) {
        $request->session()->regenerate();

        // Get the logged-in user and their role
        $user = Auth::user();
        $role = $user->role;
        $status = $user->status;

        if ($status == 1) {
            if ($role == 'admin') {
                alert()->success('Berhasil', 'Anda Berhasil Login');
                return redirect('/dashboard');
            } elseif ($role == 'user') {
                alert()->success('Berhasil', 'Anda Berhasil Login');
                return redirect('/');
            } elseif ($role == 'mitra') {
                alert()->success('Berhasil', 'Anda Berhasil Login');
                return redirect('/dashboard');
            } else {
                Auth::logout();
                Session::flash('error', 'Level pengguna tidak valid');
                return redirect('/login');
            }
        } else {
            Auth::logout();
            Session::flash('error', 'User belum dikonfirmasi admin');
            return redirect('/login');
        }
    } else {
        Session::flash('error', 'Email atau Password Salah');
        return redirect('/login');
    }
}


    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');         
    }
}
