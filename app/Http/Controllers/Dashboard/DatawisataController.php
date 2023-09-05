<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\wisata;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;


class DatawisataController extends Controller
{

    public function index()
    {   
        // menampilkan dta dari database
    	$wisata = DB::table('wisata')->get();
        return view('dashboard.data-wisata',['wisata' => $wisata]);
    }

    public function tambah()
    {
        // memanggil view tambah data wisata
        return view('dashboard.tambah-data-wisata');
    }


    public function store(Request $request)
    {
        $validator = $request -> validate([
            'namawisata' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'durasi' => 'required',
            'lokasi' => 'required',
            'fasilitas' => 'required',
            'tanggalberangkat' => 'required',
            'linklokasi' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "namawisata.required" => "Please enter nama wisata",
            "harga.required" => "Please enter harga wisata",
            "kategori.required" => "Please enter kategori wisata",
            "durasi.required" => "Please enter durasi wisata",
            "lokasi.required" => "Please enter lokasi wisata",
            "fasilitas.required" => "Please enter fasilitas wisata",
            "tanggalberangkat.required" => "Please enter tanggal berangkat",
            "linklokasi.required" => "Please enter link lokasi",
            "deskripsi.required" => "Please enter deskripsi wisata",
            "date.required" => "Please enter date",
        ]);

        $wisata = new Wisata;
        $wisata->namawisata= $request->input('namawisata');
        $wisata->harga= $request->input('harga');
        $wisata->kategori= $request->input('kategori');
        $wisata->durasi= $request->input('durasi');
        $wisata->lokasi= $request->input('lokasi');
        $wisata->fasilitas= $request->input('fasilitas');
        $wisata->tanggalberangkat= $request->input('tanggalberangkat');
        $wisata->linklokasi= $request->input('linklokasi');
        $wisata->deskripsi= $request->input('deskripsi');
        $wisata['date']= Carbon::now($request->date);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->namawisata.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/wisata/',$filename);
            $wisata->image = $filename;
        }
        $wisata->save();

        return redirect('/data-wisata') -> with('success', "Data wisata berhasil ditambahkan!");
    }


    // method untuk edit data wisata
    public function edit($id)
    {
        $wisata =  Wisata:: find($id);
        return view('dashboard.edit-data-wisata', [
            'method'=> "PUT",
            'action'=> "/data-wisata/edit/{id}'",
            'wisata'=> $wisata
        ]);
    }

    
     // update data wisata
     public function update(Request $request,$id)
     {
         $wisata = Wisata::find($id); 

         $validator = $request -> validate([
            'namawisata' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'durasi' => 'required',
            'lokasi' => 'required',
            'fasilitas' => 'required',
            'tanggalberangkat' => 'required',
            'linklokasi' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|file|max:2048,jpeg,png,jpg',  
        ],
        [
            "namawisata.required" => "Please enter nama wisata",
            "harga.required" => "Please enter harga wisata",
            "kategori.required" => "Please enter kategori wisata",
            "durasi.required" => "Please enter durasi wisata",
            "lokasi.required" => "Please enter lokasi wisata",
            "fasilitas.required" => "Please enter fasilitas wisata",
            "tanggalberangkat.required" => "Please enter tanggal berangkat",
            "linklokasi.required" => "Please enter link lokasi",
            "deskripsi.required" => "Please enter deskripsi wisata",
            "date.required" => "Please enter date",
        ]);

         if($request->hasFile('image')){
             $request->validate([ 'image' => 'image|file|max:2048,jpeg,png,jpg',]);
             Storage::delete($wisata->image);
             $file = $request->file('image');
             $extention = $file->getClientOriginalExtension();
             $filename = $request->namawisata.'_'.now()->timestamp.'.'.$extention;
             $file->storeAs('image/wisata/',$filename);
             $wisata->image = $filename;
         }

         $wisata->namawisata = $request->namawisata;
         $wisata->harga = $request->harga;
         $wisata->kategori = $request->kategori;
         $wisata->durasi = $request->durasi;
         $wisata->lokasi = $request->lokasi;
         $wisata->fasilitas = $request->fasilitas;
         $wisata->tanggalberangkat = $request->tanggalberangkat;
         $wisata->linklokasi = $request->linklokasi;
         $wisata->deskripsi = $request->deskripsi;
         $wisata->save();
 
         return redirect('data-wisata')->with('toast_success','Data wisata Telah Diupdate!');
         
    }

    public function hapus($id)
    {
        $wisata = Wisata::find($id);
        $path = 'storage/image/wisata/'.$wisata->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $wisata->delete(); 
        return back() -> with('toast_info', "Data Wisata berhasil dihapus!");
    }

    // search data wisata
    public function search_data_wisata(Request $request)
    {
        $keyword = $request->input('search_data_wisata');
        $wisata = wisata::where('namawisata', 'LIKE', '%' . $keyword . '%')
            ->orWhere('tanggalberangkat','LIKE', '%' . $keyword . '%')
            ->orWhere('kategori', 'LIKE', '%' . $keyword . '%')
            ->orWhere('harga', 'LIKE', '%' . $keyword . '%')
            ->orWhere('durasi', 'LIKE', '%' . $keyword . '%')
            ->orWhere('lokasi', 'LIKE', '%' . $keyword . '%')
            ->get();

            return view('dashboard.data-wisata',compact('wisata'));
    }

    
}
