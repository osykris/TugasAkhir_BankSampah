<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $sampah_masuk = DetailTransaksi::distinct()->get(['jenis_sampah', 'harga']);
            return view('admin.laporan.laporan-transaksi', compact('sampah_masuk'));
        }
    }
}
