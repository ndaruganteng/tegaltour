<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\rekening;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DatarekeningController extends Controller
{
    
    // view data rening
    public function index()
    {   $mitraId = Auth::user()->id;
        $rekening = DB::table('rekening')
        ->where('id_mitra', $mitraId)
        ->get();
        return view('dashboard.data-rekening',['rekening' => $rekening]);
    }

    // fungsi tambah rekening
    public function store(Request $request)
    {
        $validator = $request -> validate([
            'nama_bank' => 'required',
            'nama_rekening' => 'required',
            'no_rekening' => 'required|numeric|unique:rekening,no_rekening',
            'image_rekening' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "nama_bank.required" => "Harap masukkan nama bank",
            "no_rekening.required" => "Harap masukkan nomor rekening",
            "no_rekening.numeric" => "Nomor rekening hanya boleh berisi angka.",
            "no_rekening.unique" => "Nomor rekening ini sudah digunakan sebelumnya.",
            "nama_rekening.required" => "Please enter Nama rekening",
            "image_rekening.required" => "Silakan unggah gambar rekening",
            "image_rekening.image" => "File yang diunggah harus berupa gambar",
            "image_rekening.mimes" => "Gambar harus berformat: jpeg, png, jpg",
            "image_rekening.max" => "Ukuran gambar tidak boleh melebihi 2048 kilobita (2MB)",
        ]);

        $rekening = new Rekening;
        $rekening->id_mitra = Auth::user()->id;
        $rekening->nama_bank= $request->input('nama_bank');
        $rekening->no_rekening= $request->input('no_rekening');
        $rekening->nama_rekening= $request->input('nama_rekening');
        if ($request->hasFile('image_rekening') && $request->file('image_rekening')->isValid()) {
            $file = $request->file('image_rekening');
            $extension = $file->getClientOriginalExtension();
            $namaBank = str_replace(' ', '_', $request->nama_bank);
            $namaRekening = str_replace(' ', '_', $request->nama_rekening);
            
            $filename = $namaBank . '_' . $namaRekening . '_' . now()->timestamp . '.' . $extension;
            $file->storeAs('image/rekening/', $filename);
            $rekening->image_rekening = $filename;
        }
        $rekening->save();

        return redirect('/data-rekening')->with('toast_success', "Data rekening berhasil ditambahkan!");
    }

    // view edit data rekening
    public function edit($id)
    {
        $rekening =  Rekening:: find($id);
        return view('dashboard.data-rekening', [
            'method'=> "PUT",
            'action'=> "/data-rekening/edit/{id}'",
            'rekening'=> $rekening
        ]);
    }

    // fungsi update data rekening
    public function update(Request $request, $id)
    {
        $rekening = Rekening::find($id); 

        $validator = $request->validate([
            'nama_bank' => 'required',
            'nama_rekening' => 'required',
            'no_rekening' => 'required|numeric',
            'image_rekening' => 'image|file|max:2048,jpeg,png,jpg',
        ], 
        [
            "nama_bank.required" => "Harap masukkan nama bank",
            "no_rekening.required" => "Harap masukkan nomor rekening",
            "no_rekening.numeric" => "Nomor rekening hanya boleh berisi angka.",
            "no_rekening.unique" => "Nomor rekening ini sudah digunakan sebelumnya.",
            "nama_rekening.required" => "Harap masukkan Nama rekening",
            "image_rekening.required" => "Silakan unggah gambar rekening",
            "image_rekening.image" => "File yang diunggah harus berupa gambar",
            "image_rekening.mimes" => "Gambar harus berformat: jpeg, png, jpg",
            "image_rekening.max" => "Ukuran gambar tidak boleh melebihi 2048 kilobita (2MB)",
        ]);

        if ($request->hasFile('image_rekening')) {
            if (!empty($rekening->image_rekening)) {
                Storage::delete($rekening->image_rekening);
            }            
            $file = $request->file('image_rekening');
            $extension = $file->getClientOriginalExtension();
            $namaBank = str_replace(' ', '_', $request->nama_bank);
            $namaRekening = str_replace(' ', '_', $request->nama_rekening);       
            $filename = $namaBank . '_' . $namaRekening . '_' . now()->timestamp . '.' . $extension;
            $file->storeAs('image/rekening/', $filename);
            $rekening->image_rekening = $filename;
        }

        $rekening->nama_bank = $request->nama_bank;
        $rekening->no_rekening = $request->no_rekening;
        $rekening->nama_rekening = $request->nama_rekening;
        $rekening->save();

        return redirect('data-rekening')->with('toast_success', 'Data rekening Telah Diupdate!');
    }

    // fungsi hapus data rekening
    public function hapus($id)
    {
        $rekening = Rekening::find($id);
        $path = 'storage/image/rekening/'.$rekening->image_rekening;
        if(File::exists($path)){
            File::delete($path);
        }
        $rekening->delete(); 
        return back() -> with('toast_success', "Data rekening berhasil dihapus!");
    }

    // view data rekening admin
    public function rekening_admin()
    {   
        $rekening = DB::table('rekening')
        ->join('users', 'rekening.id_mitra', '=', 'users.id')
        ->select('rekening.*','users.nama_lengkap as nama')
        ->get();
        return view('dashboard.data-rekening-admin',['rekening' => $rekening]);
    }

}