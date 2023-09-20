<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }


    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Reset Password');
        });

        return back()->with('message', 'Kami telah mengirimkan tautan pengaturan ulang kata sandi Anda melalui email!');
    }

    public function showResetPasswordForm($token)
    {
        $tokenExists = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->exists();

        if (!$tokenExists) {
            return redirect('/')->with('error', 'Invalid or expired token!');
        }

        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $tokenExists = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->exists();

        if (!$tokenExists) {
            return back()->withInput()->with('error', 'Invalid or expired token!');
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return redirect('/login')->with('message', 'Kata sandi Anda telah diubah!');
    }
}
