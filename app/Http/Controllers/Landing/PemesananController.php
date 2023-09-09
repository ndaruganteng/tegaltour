<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\pemesanan; // Ganti "Pemesanan" dengan huruf kapital
use App\Models\wisata; // Ganti "Wisata" dengan huruf kapital
use Illuminate\Support\Facades\File; // Import class File

class PemesananController extends Controller
{
    public function store(Request $request)
    {
        $pemesanan = new Pemesanan;
        $pemesanan->namauser = $request->input('namauser');
        $pemesanan->namawisata = $request->input('namawisata');
        $pemesanan->jumlahorang = $request->input('jumlahorang');
        $pemesanan->hargasatuan = $request->input('hargasatuan');
        $pemesanan->hargatotal = $request->input('hargatotal');
        $pemesanan->tanggalberangkat = $request->input('tanggalberangkat');
        $pemesanan->status = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->input('namauser') . '_' . now()->timestamp . '.' . $extension;
            $file->storeAs('image/bukti-transfer/', $filename);
            $pemesanan->bukti_pembayaran = $filename;
        }
        $pemesanan->save();

        return redirect('/transaksi')->with('success', "Data berhasil ditambahkan!");
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
        return redirect()->back()->with('toast_success', "Bukti Pembayaran sudah ke upload!");
    }

    public function data_order()
    {
        $pemesanan = DB::table('pemesanan')->simplePaginate(5); // Ubah "simplepaginate" menjadi "simplePaginate"
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

        return redirect('data-order')->with('toast_success', 'Pembayaran telah dikonfirmasi ');
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
        
        return back()->with('toast_info', "Data berhasil dihapus!");
    }


    // method untuk menampilkan halaman pesanan saya
    public function pesanan_saya()
    {
        {  
            $pemesanan = DB::table('pemesanan')->simplePaginate(5);
             return view('landing.pesanan-saya',['pemesanan' => $pemesanan]);
         }
    }
}
