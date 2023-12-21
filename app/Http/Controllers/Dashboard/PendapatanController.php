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

    // VIEW PENDAPATN BIRO WISATA
    public function index()
    {
        $mitraId = Auth::user()->id;
        $destinasi = Wisata::select(
            'wisata.namawisata',
            'pemesanan.status_pendapatan',
            DB::raw('COUNT(pemesanan.id_pemesanan) as total_pemesan'),
            DB::raw('SUM(pemesanan.harga_total) as total_harga'),
            DB::raw('SUM(pemesanan.harga_total * 0.9) as total_harga_potong')
        )
            ->join('pemesanan', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
            ->where('pemesanan.id_mitra', $mitraId)
            ->where('pemesanan.status_perjalanan', 3)
            ->groupBy('wisata.id_wisata', 'wisata.namawisata', 'pemesanan.status_pendapatan')
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
                'mitra.nama_lengkap',
                'pemesanan.status_pendapatan'
            )
            ->get();

        $totalPotongan = $destinasi->sum('potongan');

        return view('dashboard.pendapatan-admin', compact('destinasi', 'totalPotongan'));
    }


    // VIEW PENDAPATAN BIRO WISATA
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
            'pemesanan.status_pendapatan'
        )
            ->join('pemesanan', 'wisata.id_wisata', '=', 'pemesanan.id_wisata')
            ->join('users as mitra', 'pemesanan.id_mitra', '=', 'mitra.id')
            ->whereIn('pemesanan.status', [2, 3])
            ->groupBy(
                'wisata.id_wisata',
                'wisata.namawisata',
                'pemesanan.id_mitra',
                'mitra.nama_lengkap',
                'pemesanan.status_pendapatan'
            )
            ->get();

        $totalPotongan = $destinasi->sum('potongan');

        return view('dashboard.pendapatan-biro-wisata', compact('destinasi', 'totalPotongan'));
    }

    

    // public function tarikSaldo(Request $request, $id_pemesanan)
    // {
    //     $tarikSaldo = DB::table('pemesanan')
    //         ->where('id_pemesanan', $id_pemesanan)
    //         ->update([
    //             'status_pendapatan' => 1
    //         ]);

    //     return redirect('pendapatan-admin')->with('toast_success', 'Penarikan Saldo telah dikonfirmasi ');
    // }
}