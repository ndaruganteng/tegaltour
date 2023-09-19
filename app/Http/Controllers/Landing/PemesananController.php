<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\pemesanan; 
use App\Models\wisata; 

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
        $pemesanan->status_perjalanan = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->input('namauser') . '_' . now()->timestamp . '.' . $extension;
            $file->storeAs('image/bukti-transfer/', $filename);
            $pemesanan->bukti_pembayaran = $filename;
        }
        $pemesanan->save();

        return redirect('/transaksi')->with('success', "Transaksi Telah Diproses!");
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
        return redirect()->back()->with('toast_success', "Bukti Pembayaran Sudah Dikirim!");
    }


    // menampilkan view data order
    public function data_order()
    {
        $pemesanan = DB::table('pemesanan')->simplePaginate(5);
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
        
        return back()->with('toast_info', "Data berhasil dihapus!");
    }

    
    // method untuk menampilkan halaman pesanan saya
    public function pesanan_saya()
    {
        {  
            // $pemesanan = DB::table('pemesanan')->get();
            $idUsers = Auth()->user()->nama_lengkap;
            $pemesanan = DB::table('pemesanan')->where('namauser', '=', $idUsers)->get();
            // $pemesanan = DB::table('pemesanan')
            // ->select('pemesanan.*', 'wisata.image')
            // ->rightJoin('wisata','pemesanan.namawisata','=','wisata.namawisata')
            // ->rightJoin('users','pemesanan.namauser','=','users.nama_lengkap')
            // ->where('pemesanan.namauser','=','zaim zaim')
            // ->get();
             return view('landing.pesanan-saya',['pemesanan' => $pemesanan]);
         }
    }

    // menampilkan view status perjalanan
    public function status_perjalanan()
    {
        $pemesanan = DB::table('pemesanan')->get();
        return view('dashboard.status-perjalanan', ['pemesanan' => $pemesanan]);
    }

    // fungsi status perjalanan berangkat
    public function berangkat(Request $request, $id)
    { 
        $konfirmasi = DB::table('pemesanan')
            ->where('id_pemesanan', $id)
            ->update([
                'status_perjalanan' => 2
            ]);

        return redirect('status-perjalanan')->with('toast_success', 'Status Perjalanan Berangkat ');
    }

    // status perjalanan selesai
    public function selesai(Request $request, $id)
    { 
        $konfirmasi = DB::table('pemesanan')
            ->where('id_pemesanan', $id)
            ->update([
                'status_perjalanan' => 3
            ]);

        return redirect('status-perjalanan')->with('toast_success', 'Perjalanan telah Selesai ');
    }
}
