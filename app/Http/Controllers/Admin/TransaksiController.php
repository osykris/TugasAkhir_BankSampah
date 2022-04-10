<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
		if (Auth::user()->hasRole('admin')) {
            $transaksis = DB::table('transaksis')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->where('status', 'Diajukan')->get();
        return view('admin.transaksi', compact('transaksis'));
		}
    }
}
