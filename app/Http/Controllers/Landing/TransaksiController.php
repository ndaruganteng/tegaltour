<?php

namespace App\Http\Controllers\Landing;

use App\Models\rekening;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $rekening = DB::table('rekening')->get();
        return view('landing.transaksi', ['rekening' => $rekening]);
    }
}
