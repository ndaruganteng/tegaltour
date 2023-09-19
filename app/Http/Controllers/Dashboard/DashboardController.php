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
    public function requestmitra()
    {
        return view('dashboard.request-mitra');
    }
    public function user()
    {
        return view('dashboard.data-user');
    }


}
