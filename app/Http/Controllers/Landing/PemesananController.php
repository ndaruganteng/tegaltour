<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\carbon;
use App\Models\pemesanan; 
use App\Models\wisata; 

class PemesananController extends Controller
{
    public function store(Request $request)
    {
        $pemesanan = new Pemesanan;
        $pemesanan->id_user = $request->input('id_user');
        $pemesanan->id_wisata = $request->input('id_wisata');
        $pemesanan->id_mitra = $request->input('id_mitra');
        $pemesanan->jumlah_orang = $request->input('jumlah_orang');
        $pemesanan->harga_satuan = $request->input('harga_satuan');
        $pemesanan->harga_total = $request->input('harga_total');
        $pemesanan->tanggal_berangkat = $request->input('tanggal_berangkat');
        $pemesanan->status = null;
        $pemesanan->status_perjalanan = null;
        $pemesanan['date']= Carbon::now($request->date);
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->input('namauser') . '_' . now()->timestamp . '.' . $extension;
            $file->storeAs('image/bukti-transfer/', $filename);
            $pemesanan->bukti_pembayaran = $filename;
        }
        $pemesanan->save();

        return redirect('/transaksi')->with('success', "Pemesanan Telah Berhasil, <br> Silahkan Melakukan Pembayaran!");
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::where('id_pemesanan', $id)->first();

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('image/bukti-transfer/', $filename);
            $pemesanan->bukti_pembayaran = $filename;
        }
        $pemesanan->save();
        return redirect()->back()->with('success', "Bukti Pembayaran Sudah Dikirim!");
    }


    // menampilkan view data order
    public function data_order()
    {
        $mitraId = Auth::user()->id;
        $pemesanan = DB::table('pemesanan')
            ->join('users', 'pemesanan.id_user', '=', 'users.id')
            ->join('wisata', 'pemesanan.id_wisata', '=', 'wisata.id_wisata')
            ->where('pemesanan.id_mitra', $mitraId) 
            ->select(
                'pemesanan.id_pemesanan as id_pemesanan',
                'pemesanan.id_user', 
                'users.nama_lengkap as nama_pengguna', 
                'wisata.namawisata as nama_wisata',
                'wisata.image as image',
                'pemesanan.status as status',
                'pemesanan.status_perjalanan as status_perjalanan',
                'pemesanan.date as date',
                'pemesanan.harga_total as hargatotal',
                'pemesanan.bukti_pembayaran as bukti_pembayaran',
                'pemesanan.jumlah_orang as jumlah_orang', 
                'wisata.harga as harga',
                'pemesanan.tanggal_berangkat as tanggal')
            ->get();
     
        return view('dashboard.data-order', ['pemesanan' => $pemesanan]);
    }

    // Fungsi konfirmasi pemesanan
    public function konfirmasi(Request $request, $id)
    { 
        $konfirmasi = DB::table('pemesanan')
            ->where('id_pemesanan', $id)
            ->update([
                'status' => 2
            ]);

        return redirect('data-order')->with('success', 'Pembayaran telah dikonfirmasi ');
    }

    // Method untuk hapus data pemesanan
    public function hapus($id)
    {
        $pemesanan = Pemesanan::find($id);
        $path = 'storage/image/bukti-transfer/' . $pemesanan->bukti_pembayaran;
        if (File::exists($path)) {
            File::delete($path);
        }
        $pemesanan->delete();
        
        return back()->with('error', "Data berhasil dihapus!");
    }

    
    // method untuk menampilkan halaman pesanan saya
    public function pesanan_saya()
    {
        {
            $usersId = Auth::user()->id;
            $pemesanan = DB::table('pemesanan')
                ->join('users', 'pemesanan.id_user', '=', 'users.id')
                ->join('wisata', 'pemesanan.id_wisata', '=', 'wisata.id_wisata')
                ->where('pemesanan.id_user', $usersId) 
                ->where('pemesanan.status', '2')
                ->select(
                    'pemesanan.id_pemesanan as id_pemesanan',
                    'pemesanan.id_user', 
                    'users.nama_lengkap as nama_pengguna', 
                    'wisata.namawisata as nama_wisata',
                    'wisata.image as image',
                    'pemesanan.status as status',
                    'pemesanan.status_perjalanan as status_perjalanan',
                    'pemesanan.date as date',
                    'pemesanan.harga_total as hargatotal',
                    'pemesanan.bukti_pembayaran as bukti_pembayaran',
                    'pemesanan.jumlah_orang as jumlah_orang', 
                    'wisata.harga as harga',
                    'pemesanan.tanggal_berangkat as tanggal',
                    'pemesanan.id_wisata as id_wisata')
                ->get();
         
            return view('landing.pesanan-saya', ['pemesanan' => $pemesanan]);
        }
    }

    // menampilkan view status perjalanan
    public function status_perjalanan()
    {
        $mitraId = Auth::user()->id;
        $pemesanan = DB::table('pemesanan')
            ->join('users', 'pemesanan.id_user', '=', 'users.id')
            ->join('wisata', 'pemesanan.id_wisata', '=', 'wisata.id_wisata')
            ->where('pemesanan.id_mitra', $mitraId) 
            ->select(
                'pemesanan.id_pemesanan as id_pemesanan',
                'pemesanan.id_user', 
                'users.nama_lengkap as nama_pengguna', 
                'wisata.namawisata as nama_wisata',
                'wisata.image as image',
                'pemesanan.status as status',
                'pemesanan.status_perjalanan as status_perjalanan',
                'pemesanan.date as date',
                'pemesanan.harga_total as hargatotal',
                'pemesanan.bukti_pembayaran as bukti_pembayaran',
                'pemesanan.jumlah_orang as jumlah_orang', 
                'wisata.harga as harga',
                'pemesanan.tanggal_berangkat as tanggal')
            ->get();

        return view('dashboard.status-perjalanan', ['pemesanan' => $pemesanan]);
    }


    // fungsi status perjalanan berangkat
    public function berangkat(Request $request, $id)
    { 
        $berangkat = DB::table('pemesanan')
            ->where('id_pemesanan', $id)
            ->update([
                'status_perjalanan' => 2
            ]);

        return redirect('status-perjalanan')->with('success', 'Status Perjalanan Berangkat ');
    }

    // status perjalanan selesai
    public function selesai(Request $request, $id)
    { 
        $selesai = DB::table('pemesanan')
            ->where('id_pemesanan', $id)
            ->update([
                'status_perjalanan' => 3
            ]);

        return redirect('status-perjalanan')->with('success', 'Perjalanan telah Selesai ');
    }
}
