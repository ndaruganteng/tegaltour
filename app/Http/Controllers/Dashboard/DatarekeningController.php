<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\rekening;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DatarekeningController extends Controller
{
    
    // menampilkan data dari database
    public function index()
    {   
        $rekening = DB::table('rekening')->simplepaginate(5);
        return view('dashboard.data-rekening',['rekening' => $rekening]);
    }

    // memanggil view tambah data rekening
    public function tambah()
    {
        return view('dashboard.tambah-data-rekening');
    }

    public function store(Request $request)
    {
        $validator = $request -> validate([
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'nama_rekening' => 'required',
            'image_rekening' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "nama_bank.required" => "Please enter nama bank",
            "no_rekening.required" => "Please enter nomor rekening",
            "nama_rekening.required" => "Please enter Nama rekening",
        ]);

        $rekening = new Rekening;
        $rekening->nama_bank= $request->input('nama_bank');
        $rekening->no_rekening= $request->input('no_rekening');
        $rekening->nama_rekening= $request->input('nama_rekening');
        if($request->hasFile('image_rekening')){
            $file = $request->file('image_rekening');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->nama_bank.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/rekening/',$filename);
            $rekening->image_rekening = $filename;
        }
        $rekening->save();

        return redirect('/data-rekening') -> with('success', "Data rekening berhasil ditambahkan!");
    }

    // method untuk edit data rekening
    public function edit($id)
    {
        $rekening =  Rekening:: find($id);
        return view('dashboard.edit-data-rekening', [
            'method'=> "PUT",
            'action'=> "/data-rekening/edit/{id}'",
            'rekening'=> $rekening
        ]);
    }

    // update data rekening
    public function update(Request $request,$id)
    {
        $rekening = Rekening::find($id); 

        $validator = $request -> validate([
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'nama_rekening' => 'required',
            'image_rekening' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "nama_bank.required" => "Please enter nama bank",
            "no_rekening.required" => "Please enter nomor rekening",
            "nama_rekening.required" => "Please enter Nama rekening",
        ]);

        if($request->hasFile('image_rekening')){
            $request->validate([ 'image_rekening' => 'image|file|max:2048,jpeg,png,jpg',]);
            Storage::delete($rekening->image_rekening);
            $file = $request->file('image_rekening');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->nama_bank.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/rekening/',$filename);
            $rekening->image_rekening = $filename;
        }

        $rekening->nama_bank = $request->nama_bank;
        $rekening->no_rekening = $request->no_rekening;
        $rekening->nama_rekening = $request->nama_rekening;
        $rekening->save();

        return redirect('data-rekening')->with('toast_success','Data rekening Telah Diupdate!');
   }

   public function hapus($id)
   {
       $rekening = Rekening::find($id);
       $path = 'storage/image/rekening/'.$rekening->image_rekening;
       if(File::exists($path)){
           File::delete($path);
       }
       $rekening->delete(); 
       return back() -> with('toast_info', "Data rekening berhasil dihapus!");
   }

      // search data rekening
    public function search_data_rekening(Request $request)
    {
        $keyword = $request->input('search_data_rekening');
        $rekening = rekening::where('nama_bank', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nama_rekening','LIKE', '%' . $keyword . '%')
            ->orWhere('no_rekening', 'LIKE', '%' . $keyword . '%')
            ->get();

            return view('dashboard.data-rekening',compact('rekening'));
    }


}
