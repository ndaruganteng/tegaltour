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
    	$mitra = DB::table('mitra')->simplepaginate(5);

        return view('dashboard.request-mitra',['mitra' => $mitra]);
    }
             
	// memanggil view form join mitra
    public function tambah()
    {
	    return view('landing.join-mitra');
    }

    public function store(Request $request)

    {
        $validator = $request -> validate([
            'nama_lengkap' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], 
        [
            "nama_lengkap.required" => "Please enter Nama Lengkap",
            "telepon.required" => "Please enter telepon",
            "email.required" => "Please enter email",
            "password.required" => "Please enter password",
        ]);


        $mitra = new User;
        $namaMitra = $mitra->nama_lengkap= $request->input('nama_lengkap');
        $mitra->no_telepon= $request->input('telepon');
        $email = $mitra->email= $request->input('email');
        $alamat = $mitra->alamat= $request->input('alamat');
        $mitra->role= 'mitra';
        $password = $request->input('password');
        $mitra->password = $password;
        if ($request->hasFile('bukti_mitra')) {
            $file = $request->file('bukti_mitra');
            $extension = $file->getClientOriginalExtension();
            $filename = $mitra->nama_lengkap. '_' . now()->timestamp . '.' . $extension;
            $file->storeAs('image/bukti-mitra/', $filename);
            $mitra->bukti_mitra = $filename;
        }
        $mitra->save();
        
        return redirect('/join-mitra')->with('message', 'Permintaan Join Mitra Anda telah Terkirim Silahkan Cek Email!');
    }

    // method untuk hapus data mitra
    public function hapus($id)
    {
        $mitra = Mitra::find($id);
        $mitra->delete();
        
        return back()->with('error', "Data berhasil dihapus!");
    }

    // search data mitra
    public function search_data_mitra(Request $request)
    {
        $keyword = $request->input('search_data_mitra');
        $mitra = mitra::where('nama_lengkap', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nama_bisnis','LIKE', '%' . $keyword . '%')
            ->orWhere('alamat', 'LIKE', '%' . $keyword . '%')
            ->orWhere('telepon', 'LIKE', '%' . $keyword . '%')
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')
            ->orWhere('password', 'LIKE', '%' . $keyword . '%')
            ->get();

        return view('dashboard.request-mitra',compact('mitra'));
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
