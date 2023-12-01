<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\wisata;
use App\Models\kategori;

class DatawisataController extends Controller
{

    // view data wisata
    public function index()
    {   
        $mitraId = Auth::user()->id;
        $wisata = DB::table('wisata')
        ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->where('wisata.id_mitra', $mitraId)
        ->select('wisata.*', 'kategori.nama_kategori as kategori')
        ->get();
    
        return view('dashboard.data-wisata',['wisata' => $wisata]);
    }

    // view tambah data wisata
    public function tambah()
    {
        $kategori = kategori::all();
        return view('dashboard.tambah-data-wisata',compact('kategori'));
    }

    // fungsi tambah data wisata
    public function store(Request $request)
    {
        $validator = $request->validate([
            'namawisata' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'durasi' => 'required',
            'lokasi' => 'required',
            'titikkumpul' => 'required',
            'fasilitas' => 'required|string|max:9000',
            'tanggalberangkat' => 'required',
            'jamberangkat' => 'required',
            'linklokasi' => 'required',
            'deskripsi' => 'required|string|max:9000',
            'image' => 'image|file|max:2048,jpeg,png,jpg',
        ],
        [
            "namawisata.required" => "Harap masukkan nama wisata",
            "harga.required" => "Harap masukkan harga wisata",
            "harga.numeric" => "Harga harus berupa angka",
            "kategori.required" => "Harap masukkan kategori wisata",
            "durasi.required" => "Harap masukkan durasi wisata",
            "lokasi.required" => "Harap masukkan lokasi wisata",
            "titikkumpul.required" => "Harap masukkan titik kumpul wisata",
            "fasilitas.required" => "Harap masukkan fasilitas wisata",
            "tanggalberangkat.required" => "Harap masukkan tanggal berangkat",
            "jamberangkat.required" => "Harap masukkan Jam berangkat",
            "linklokasi.required" => "Harap masukkan link lokasi",
            "deskripsi.required" => "Harap masukkan deskripsi wisata",
            "deskripsi.max" => "Deskripsi tidak boleh melebihi 9000 karakter.",
            "fasilitas.max" => "Fasilitas tidak boleh melebihi 9000 karakter.",
            "image.required" => "Silakan unggah gambar untuk wisata",
            "image.mimes" => "Gambar harus berformat: jpeg, png, jpg",
            "image.max" => "Ukuran gambar tidak boleh melebihi 2048 kilobita (2MB)",
        ]);
        

        $wisata = new Wisata;
        $wisata->id_mitra = Auth::user()->id;
        $wisata->namawisata= $request->input('namawisata');
        $wisata->slug = Str::slug($request->namawisata);
        $wisata->harga= $request->input('harga');
        $wisata->kategori= $request->input('kategori');
        $wisata->durasi= $request->input('durasi');
        $wisata->lokasi= $request->input('lokasi');
        $wisata->titikkumpul= $request->input('titikkumpul');
        $wisata->fasilitas= $request->input('fasilitas');
        $wisata->tanggalberangkat= $request->input('tanggalberangkat');
        $wisata->jamberangkat= $request->input('jamberangkat');
        $wisata->linklokasi= $request->input('linklokasi');
        $wisata->deskripsi= $request->input('deskripsi');
        $wisata->date = Carbon::now();
        if($request->hasFile('image')&& $request->file('image')->isValid()){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->namawisata.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/wisata/',$filename);
            $wisata->image = $filename;
        }
        $wisata->save();

        return redirect('/data-wisata') -> with('success', "Data wisata berhasil ditambahkan!");
    }

    // view edit data wisata
    public function edit($id)
    {   
        $kategori = kategori::all();
        $wisata =  Wisata:: find($id);
        return view('dashboard.edit-data-wisata', [
            'method'=> "PUT",
            'action'=> "/data-wisata/edit/{id}'",
            'wisata'=> $wisata
        ],compact('kategori'));
    }

     // fungsi update data wisata
     public function update(Request $request,$id)
    {
         $wisata = Wisata::find($id); 
         $validator = $request->validate([
            'namawisata' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'durasi' => 'required',
            'lokasi' => 'required',
            'titikkumpul' => 'required',
            'fasilitas' => 'required|string|max:9000',
            'tanggalberangkat' => 'required',
            'jamberangkat' => 'required',
            'linklokasi' => 'required',
            'deskripsi' => 'required|string|max:9000',
            'image' => 'image|file|max:2048,jpeg,png,jpg',
        ],
        [
            "namawisata.required" => "Harap masukkan nama wisata",
            "harga.required" => "Harap masukkan harga wisata",
            "harga.numeric" => "Harga harus berupa angka",
            "kategori.required" => "Harap masukkan kategori wisata",
            "durasi.required" => "Harap masukkan durasi wisata",
            "lokasi.required" => "Harap masukkan lokasi wisata",
            "titikkumpul.required" => "Harap masukkan titik kumpul wisata",
            "fasilitas.required" => "Harap masukkan fasilitas wisata",
            "tanggalberangkat.required" => "Harap masukkan tanggal berangkat",
            "jamberangkat.required" => "Harap masukkan Jam berangkat",
            "linklokasi.required" => "Harap masukkan link lokasi",
            "deskripsi.required" => "Harap masukkan deskripsi wisata",
            "deskripsi.max" => "Deskripsi tidak boleh melebihi 9000 karakter.",
            "fasilitas.max" => "Fasilitas tidak boleh melebihi 9000 karakter.",
            "image.required" => "Silakan unggah gambar untuk wisata",
            "image.mimes" => "Gambar harus berformat: jpeg, png, jpg",
            "image.max" => "Ukuran gambar tidak boleh melebihi 2048 kilobita (2MB)",
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);      
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->input('namawisata') . '_' . now()->timestamp . '.' . $extension;
            $file->storeAs('image/wisata/', $filename);
            if (!empty($wisata->image)) {
                Storage::delete('image/wisata/' . $wisata->image);
            }
            $wisata->image = $filename;
        }

         $wisata->namawisata = $request->namawisata;
         $wisata->harga = $request->harga;
         $wisata->kategori = $request->kategori;
         $wisata->durasi = $request->durasi;
         $wisata->lokasi = $request->lokasi;
         $wisata->titikkumpul = $request->titikkumpul;
         $wisata->tanggalberangkat = $request->tanggalberangkat;
         $wisata->jamberangkat = $request->jamberangkat;
         $wisata->linklokasi = $request->linklokasi;
         $wisata->deskripsi = $request->deskripsi;
         $wisata->fasilitas = $request->fasilitas;
         $wisata->save();
 
         return redirect('data-wisata')->with('success','Data wisata Telah Diupdate!');
         
    }

    // fungsi hapus data wisata
    public function hapus($id)
    {
        $wisata = Wisata::find($id);
        $path = 'storage/image/wisata/'.$wisata->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $wisata->delete(); 
        return back() -> with('success', "Data Wisata berhasil dihapus!");
    }

    // view data wisata admin
    public function wisata_admin()
    {
        $wisata = DB::table('wisata')
        ->join('users', 'wisata.id_mitra', '=', 'users.id')
        ->join('kategori', 'wisata.kategori', '=', 'kategori.id_kategori')
        ->select('wisata.*',
            'users.nama_lengkap as nama',
            'kategori.nama_kategori as kategori')
        ->get();
        
        return view('dashboard.data-wisata-admin',['wisata' => $wisata]);
    }
    
}
