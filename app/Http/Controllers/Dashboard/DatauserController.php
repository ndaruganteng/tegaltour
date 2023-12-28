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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;


class DatauserController extends Controller
{

    // view data user
    public function index()
    {   
    	$users = DB::table('users')->get();
        return view('dashboard.data-user',['users' => $users]);
    }

    // view REQQUEST MITRA 
    // public function join_mitra()
    // {   
    // 	$users = DB::table('users')
    //     ->where('status', null)
    //     ->get();

    //     return view('dashboard.request-mitra',['users' => $users]);
    // }
    public function join_mitra()
    {   
        // Assuming $newMitraRequests is calculated or fetched somewhere in your code
        $newMitraRequests = User::where('status', 'new')->count();

        $users = DB::table('users')
            ->where('status', null)
            ->get();

        return view('dashboard.request-mitra', ['users' => $users, 'newMitraRequests' => $newMitraRequests]);
    }

    // public function boot()
    // {
    //     $newMitraRequests = DB::table('mitra_requests')->where('status', 'new')->count();

    //     View::share('newMitraRequests', $newMitraRequests);
    // }
        


    // hapus user
    public function hapus_user($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->with('toast_error', "Data user tidak ditemukan!");
        }
        $profilePicture = $user->profile_picture;
        if ($profilePicture) {
            Storage::delete("image/user/{$profilePicture}");
        }
        $user->delete();
    
        return back()->with('toast_success', "Data user berhasil dihapus!");
    }

    // view profile
    public function profile()
    {
        $user = auth()->user();
        return view('dashboard.profile', compact('user'));
    }

    // public function updateProfile(Request $request, $id)
    // {
    //     $user = User::find($id);
    
    //     $request->validate([
    //         'nama_lengkap' => ['required'],
    //         'rekening' => ['required'],
    //         'no_telepon' => ['required', 'numeric', 'digits_between:11,13'],
    //         'profile_picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
    //     ], [
    //         'required' => 'Kolom :attribute harus diisi.',
    //         'numeric' => ':attribute harus berupa angka.',
    //         'digits_between' => ':attribute harus terdiri dari 11 sampai 13 digit.',
    //         'image' => 'Berkas :attribute harus berupa gambar.',
    //         'mimes' => 'Berkas :attribute harus memiliki format jpeg, png, jpg, atau gif.',
    //         'max' => 'Ukuran berkas :attribute tidak boleh lebih dari 2 MB.',
    //     ]);
    
    //     $user->nama_lengkap = $request->input('nama_lengkap');
    //     $user->no_telepon = $request->input('no_telepon');
    //     $user->alamat = $request->input('alamat');
    //     $user->rekening = $request->input('rekening');
    
    //     if ($request->hasFile('profile_picture')) {
    //         if ($user->profile_picture) {
    //             Storage::disk('public')->delete('image/user/' . $user->profile_picture);
    //         }
            
    //         $filename = str_replace(' ', '_', $user->nama_lengkap) . '_' . now()->timestamp . '.' . $request->file('profile_picture')->getClientOriginalExtension();
    
    //         $request->file('profile_picture')->storeAs('image/user/', $filename, 'public');
    //         $user->profile_picture = $filename;
    //     }
    
    //     $user->save();
    
    //     return redirect()->route('profile')->with('toast_success', 'Profil berhasil diperbarui.');
    // }

//     public function updateProfile(Request $request, $id)
// {
//     $user = User::find($id);

//     $request->validate([
//         'nama_lengkap' => ['required'],
//         'rekening' => ['required'],
//         'no_telepon' => ['required', 'numeric', 'digits_between:11,13'],
//         'profile_picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
//         'password' => ['nullable', 'confirmed', 'min:6'], // Add password validation rules
//     ], [
//         'required' => 'Kolom :attribute harus diisi.',
//         'numeric' => ':attribute harus berupa angka.',
//         'digits_between' => ':attribute harus terdiri dari 11 sampai 13 digit.',
//         'image' => 'Berkas :attribute harus berupa gambar.',
//         'mimes' => 'Berkas :attribute harus memiliki format jpeg, png, jpg, atau gif.',
//         'max' => 'Ukuran berkas :attribute tidak boleh lebih dari 2 MB.',
//         'confirmed' => 'Konfirmasi :attribute tidak cocok.',
//         'min' => ':attribute minimal harus 6 karakter.', // Password minimum length
//     ]);

//     $user->nama_lengkap = $request->input('nama_lengkap');
//     $user->no_telepon = $request->input('no_telepon');
//     $user->alamat = $request->input('alamat');
//     $user->rekening = $request->input('rekening');

//     // Update password if provided
//     if ($request->filled('password')) {
//         $user->password = bcrypt($request->input('password'));
//     }

//     if ($request->hasFile('profile_picture')) {
//         if ($user->profile_picture) {
//             Storage::disk('public')->delete('image/user/' . $user->profile_picture);
//         }

//         $filename = str_replace(' ', '_', $user->nama_lengkap) . '_' . now()->timestamp . '.' . $request->file('profile_picture')->getClientOriginalExtension();

//         $request->file('profile_picture')->storeAs('image/user/', $filename, 'public');
//         $user->profile_picture = $filename;
//     }

//     $user->save();

//     return redirect()->route('profile')->with('toast_success', 'Profil berhasil diperbarui.');
// }

public function updateProfile(Request $request, $id)
{
    $user = User::find($id);

    $request->validate([
        'nama_lengkap' => ['required'],
        'rekening' => ['required'],
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

    $this->updateProfileFields($user, $request);

    return redirect()->route('profile')->with('toast_success', 'Profil berhasil diperbarui.');
}

public function updatePassword(Request $request, $id)
{
    $user = User::find($id);

    $request->validate([
        'password' => ['required', 'confirmed', 'min:6'],
    ], [
        'required' => 'Kolom :attribute harus diisi.',
        'confirmed' => 'Konfirmasi :attribute tidak cocok.',
        'min' => ':attribute minimal harus 6 karakter.', // Password minimum length
    ]);

    $user->password = bcrypt($request->input('password'));
    $user->save();

    return redirect()->route('profile')->with('toast_success', 'Password berhasil diperbarui.');
}

private function updateProfileFields($user, $request)
{
    $user->nama_lengkap = $request->input('nama_lengkap');
    $user->no_telepon = $request->input('no_telepon');
    $user->alamat = $request->input('alamat');
    $user->rekening = $request->input('rekening');

    if ($request->hasFile('profile_picture')) {
        if ($user->profile_picture) {
            Storage::disk('public')->delete('image/user/' . $user->profile_picture);
        }

        $filename = str_replace(' ', '_', $user->nama_lengkap) . '_' . now()->timestamp . '.' . $request->file('profile_picture')->getClientOriginalExtension();

        $request->file('profile_picture')->storeAs('image/user/', $filename, 'public');
        $user->profile_picture = $filename;
    }

    $user->save();
}


}