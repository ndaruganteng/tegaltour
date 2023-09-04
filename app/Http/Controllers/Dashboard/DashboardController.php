<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }
    public function order()
    {
        return view('dashboard.data-order');
    }
    public function kategori()
    {
        return view('dashboard.kategori');
    }
    public function requestmitra()
    {
        return view('dashboard.request-mitra');
    }
    public function user()
    {
        return view('dashboard.data-user');
    }
    public function detail()
    {
        return view('dashboard.detail-data-wisata');
    }


}
