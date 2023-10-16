<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class DatauserController extends Controller
{
    public function index()
    {   
    	$users = DB::table('users')->get();
        return view('dashboard.data-user',['users' => $users]);
    }

    // search data User
    public function search_user(Request $request)
    {
        $keyword = $request->input('search_user');
        $users = User::where('nama_lengkap', 'LIKE', '%' . $keyword . '%')
            ->orWhere('no_telepon','LIKE', '%' . $keyword . '%')
            ->orWhere('email','LIKE', '%' . $keyword . '%')
            ->orWhere('role', 'LIKE', '%' . $keyword . '%')
            ->get();

            return view('dashboard.data-user',compact('users'));
    }


    // join mitra
    public function join_mitra()
    {   
    	$users = DB::table('users')
    ->where('status', null)
    ->get();


        return view('dashboard.request-mitra',['users' => $users]);
    }

}
