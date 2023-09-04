<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    public function index()
    {   
        $promotion = DB::table('promotion')->simplepaginate(5);
        return view('dashboard.promotion',['promotion' => $promotion]);
    }

    // memanggil view tambah data Promotion
    public function tambah()
    {
        return view('dashboard.tambah-promotion');
    }

    public function store(Request $request)
    {
        $validator = $request -> validate([
            'nama_promotion' => 'required',
            'image_promotion' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "nama_promotion.required" => "Please enter nama image",
        ]);

        $promotion = new Promotion;
        $promotion->nama_promotion= $request->input('nama_promotion');
        if($request->hasFile('image_promotion')){
            $file = $request->file('image_promotion');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->nama_promotion.'_'.now()->timestamp.'.'.$extention;
            $file->storeAs('image/promotion/',$filename);
            $promotion->image_promotion = $filename;
        }
        $promotion->save();

        return redirect('/promotion') -> with('success', "Data Promotion berhasil ditambahkan!");
    }

    // method untuk edit data promotion
    public function edit($id)
    {
        $promotion =  Promotion:: find($id);
        return view('dashboard.edit-promotion', [
            'method'=> "PUT",
            'action'=> "/promotion/edit/{id}'",
            'promotion'=> $promotion
        ]);
    }

     // update data promotion
     public function update(Request $request,$id)
     {
         $promotion = Promotion::find($id); 
 
         $validator = $request -> validate([
            'nama_promotion' => 'required',
            'image_promotion' => 'image|file|max:2048,jpeg,png,jpg',  
        ], 
        [
            "nama_promotion.required" => "Please enter nama image",
        ]);
 
         if($request->hasFile('image_promotion')){
             $request->validate([ 'image_promotion' => 'image|file|max:2048,jpeg,png,jpg',]);
             Storage::delete($promotion->image_promotion);
             $file = $request->file('image_promotion');
             $extention = $file->getClientOriginalExtension();
             $filename = $request->nama_promotion.'_'.now()->timestamp.'.'.$extention;
             $file->storeAs('image/promotion/',$filename);
             $promotion->image_promotion = $filename;
         }
 
         $promotion->nama_promotion = $request->nama_promotion;
         $promotion->save();
 
         return redirect('promotion')->with('toast_success','Data promotion Telah Diupdate!');
    }

    public function hapus($id)
    {
        $promotion = Promotion::find($id);
        $path = 'storage/image/promotion/'.$promotion->image_promotion;
        if(File::exists($path)){
            File::delete($path);
        }
        $promotion->delete(); 
        return back() -> with('toast_info', "Data Promotion berhasil dihapus!");
    }

        // search data promotion
        public function search_promotion(Request $request)
        {
            $keyword = $request->input('search_promotion');
            $promotion = promotion::where('nama_promotion', 'LIKE', '%' . $keyword . '%')
                ->get();
    
            return view('dashboard.promotion',compact('promotion'));
        }
}
