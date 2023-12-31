<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pemesanan;
use App\Models\wisata;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PendapatanController extends Controller
{
    
    // VIEW PENDATAN 
    // public function index()
    // {
    //     $mitraId = Auth::user()->id;

    //     $destinasi = Wisata::select(
    //         'wisata.namawisata',
    //         DB::raw('COUNT(pemesanan.id_pemesanan) as total_pemesan'),
    //         DB::raw('SUM(pemesanan.harga_total) as total_harga'),
    //         DB::raw('SUM(pemesanan.harga_total * 0.9) as total_harga_potong'),
    //         DB::raw('MAX(pemesanan.status_pendapatan) as status_pendapatan') // Ambil status terakhir
    //     )
    //         ->join('pemesanan', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
    //         ->where('pemesanan.id_mitra', $mitraId)
    //         ->where('pemesanan.status_perjalanan', 3)
    //         ->groupBy('wisata.namawisata')
    //         ->get();

    //     // Jumlahkan total_harga_potong berdasarkan namawisata
    //     $totalHargaPotong = $destinasi->sum('total_harga_potong');

    //     return view('dashboard.pendapatan', compact('destinasi', 'totalHargaPotong'));
    // }
    public function index()
{
    $mitraId = Auth::user()->id;

    $destinasi = Wisata::select(
        'wisata.namawisata',
        DB::raw('COUNT(pemesanan.id_pemesanan) as total_pemesan'),
        DB::raw('SUM(pemesanan.harga_total) as total_harga'),
        DB::raw('SUM(pemesanan.harga_total * 0.9) as total_harga_potong'),
        DB::raw('MAX(pemesanan.status_pendapatan) as status_pendapatan'),
        DB::raw('SUM(pemesanan.jumlah_orang) as jumlah_orang')
    )
        ->join('pemesanan', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
        ->where('pemesanan.id_mitra', $mitraId)
        ->where('pemesanan.status_perjalanan', 3)
        ->groupBy('wisata.namawisata')
        ->get();

    // Jumlahkan total_harga_potong berdasarkan namawisata
    $totalHargaPotong = $destinasi->sum('total_harga_potong');

    return view('dashboard.pendapatan', compact('destinasi', 'totalHargaPotong'));
}


    // VIEW PENDAPATAN ADMIN
    public function view_pendapatan()
    {
        $destinasi = Wisata::select(
            'wisata.namawisata',
            'pemesanan.id_mitra',
            'pemesanan.id_pemesanan',
            'mitra.nama_lengkap as nama_lengkap',
            DB::raw('COUNT(pemesanan.id_pemesanan) as total_pemesan'),
            DB::raw('SUM(pemesanan.harga_total) as total_harga'),
            DB::raw('SUM(pemesanan.harga_total * 0.9) as total_harga_potong'),
            DB::raw('(SUM(pemesanan.harga_total) - SUM(pemesanan.harga_total * 0.9)) as potongan'),
            'pemesanan.status_pendapatan'
        )
            ->join('pemesanan', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
            ->join('users as mitra', 'pemesanan.id_mitra', '=', 'mitra.id')
            ->whereIn('pemesanan.status', [2, 3])
            ->groupBy(
                'wisata.id_wisata',
                'wisata.namawisata',
                'pemesanan.id_mitra',
                'pemesanan.id_pemesanan',
                'mitra.nama_lengkap',
                'pemesanan.status_pendapatan'
            )
            ->get();

        $totalPotongan = $destinasi->sum('potongan');

        return view('dashboard.pendapatan-admin', compact('destinasi', 'totalPotongan'));
    }


    // VIEW PENDAPATAN BIRO WISATA
    // public function view_pendapatan_biro()
    // {
    //     $destinasi = Wisata::select(
    //         'wisata.namawisata',
    //         'pemesanan.id_mitra',
    //         'mitra.nama_lengkap as nama_lengkap',
    //         DB::raw('COUNT(pemesanan.id_pemesanan) as total_pemesan'),
    //         DB::raw('SUM(pemesanan.harga_total) as total_harga'),
    //         DB::raw('SUM(pemesanan.harga_total * 0.9) as total_harga_potong'),
    //         DB::raw('(SUM(pemesanan.harga_total) - SUM(pemesanan.harga_total * 0.9)) as potongan'),
    //         'pemesanan.status_pendapatan'
    //     )
    //         ->join('pemesanan', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
    //         ->join('users as mitra', 'pemesanan.id_mitra', '=', 'mitra.id')
    //         ->whereIn('pemesanan.status', [2, 3])
    //         ->groupBy(
    //             'wisata.namawisata',
    //             'pemesanan.id_mitra',
    //             'mitra.nama_lengkap',
    //             'pemesanan.status_pendapatan'
    //         )
    //         ->get();
    
    //     $totalPotongan = $destinasi->sum('potongan');
    
    //     return view('dashboard.pendapatan-biro-wisata', compact('destinasi', 'totalPotongan'));
    // }
    public function view_pendapatan_biro()
{
    $destinasi = Wisata::select(
        'wisata.namawisata',
        'pemesanan.id_mitra',
        'mitra.nama_lengkap as nama_lengkap',
        DB::raw('COUNT(pemesanan.id_pemesanan) as total_pemesan'),
        DB::raw('SUM(pemesanan.harga_total) as total_harga'),
        DB::raw('SUM(pemesanan.harga_total * 0.9) as total_harga_potong'),
        DB::raw('(SUM(pemesanan.harga_total) - SUM(pemesanan.harga_total * 0.9)) as potongan'),
        'pemesanan.status_pendapatan',
        DB::raw('SUM(pemesanan.jumlah_orang) as jumlah_orang') // Jumlahkan jumlah_orang
    )
        ->join('pemesanan', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
        ->join('users as mitra', 'pemesanan.id_mitra', '=', 'mitra.id')
        ->whereIn('pemesanan.status', [2, 3])
        ->groupBy(
            'wisata.namawisata',
            'pemesanan.id_mitra',
            'mitra.nama_lengkap',
            'pemesanan.status_pendapatan'
        )
        ->get();

    $totalPotongan = $destinasi->sum('potongan');

    return view('dashboard.pendapatan-biro-wisata', compact('destinasi', 'totalPotongan'));
}


    // FUNGSI TARIK SALDO
    public function tarikSaldo(Request $request, $namaWisata)
    {
        $mitraId = Auth::user()->id;
        DB::table('pemesanan')
            ->join('wisata', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
            ->where('pemesanan.id_mitra', $mitraId)
            ->where('wisata.namawisata', $namaWisata)
            ->where('pemesanan.status_perjalanan', 3)
            ->update([
                'status_pendapatan' => 1
            ]);
    
        return redirect('pendapatan')->with('toast_success', 'Penarikan Saldo untuk ' . $namaWisata . ' telah dikonfirmasi');
    }
    
    
    // FUNGSI KONFIRMASI SALDO
    public function konfirmasitarikSaldo(Request $request, $namaWisata)
    {
        DB::table('pemesanan')
            ->join('wisata', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
            ->where('wisata.namawisata', $namaWisata)
            ->where('pemesanan.status_perjalanan', 3)
            ->update([
                'status_pendapatan' => 2
            ]);
    
        return redirect('pendapatan-biro-wisata')->with('toast_success', 'Penarikan Saldo untuk ' . $namaWisata . ' telah dikonfirmasi');
    }
    
    public function ubahStatusPendapatan(Request $request, $id_pemesanan)
    {
        DB::table('pemesanan')
            ->join('wisata', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
            ->where('pemesanan.id_mitra', $id_pemesanan)
            ->whereIn('pemesanan.status', [2, 3])
            ->update([
                'pemesanan.status_pendapatan' => 1
            ]);
    
        return redirect('pendapatan')->with('toast_success', 'Status Pendapatan telah diubah untuk mitra ID: ' . $id_pemesanan);
    }
    
}