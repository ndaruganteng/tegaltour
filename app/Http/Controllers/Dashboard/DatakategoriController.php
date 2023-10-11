<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\kategori;

class DatakategoriController extends Controller
{

    public function index()
    {   
        $kategori = DB::table('kategori')->get();
        return view('dashboard.data-kategori',['kategori' => $kategori]);
    }

    // view tambah kategori
    public function tambah()
    {
        return view('dashboard.data-kategori');
    }

    // fungsi tambah kategori
    public function store(Request $request)
    {
        $validator = $request -> validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori',
        ], 
        [
            "nama_kategori.required" => "Please enter nama kategori",
            'nama_kategori.unique' => 'Nama kategori sudah ada .',
        ]);

        $kategori = new Kategori;
        $kategori->nama_kategori= $request->input('nama_kategori');
        $kategori->save();

        return redirect('/data-kategori')->with('success', " Kategori berhasil ditambahkan!");
    }



    // method untuk edit data kategori
    public function edit($id)
    {
        $kategori =  Kategori:: find($id);
        return view('dashboard.data-kategori', [
            'method'=> "PUT",
            'action'=> "/data-kategori/edit/{id_kategori}'",
            'kategori'=> $kategori
        ]);
    }


        // update data rekening
        public function update(Request $request,$id)
        {
            $kategori = Kategori::find($id); 
            $validator = $request -> validate([
                'nama_kategori' => 'required|unique:kategori,nama_kategori',
            ], 
            [
                "nama_kategori.required" => "Please enter nama kategori",
                'nama_kategori.unique' => 'Nama kategori sudah ada .',
            ]);
    
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();
    
            return redirect('data-kategori')->with('success','Data kategori Telah Diupdate!');
       }

    // fungsi hapus kategori
//     public function hapus($id)
//    {
//        $kategori = Kategori::find($id);
//        $kategori->delete(); 
//        return back()->with('toast_error', "Data kategori berhasil dihapus!");
//    }

    public function deleteElement($id)
    {
        $kategori = Kategori::find($id);
         $kategori->delete(); 

        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
