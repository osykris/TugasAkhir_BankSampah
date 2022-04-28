<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\JenisSampahController;
use App\Models\Artikel;
use App\Models\DataSampah;
use App\Models\PenarikanSaldo;
use App\Models\PenjualanSampah;
use App\Models\ProdukDaurUlang;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\SaldoTPS3R;
use App\Models\SaldoTPS3RKeluar;
use App\Models\UserTPS3R;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            $diajukan = Transaksi::where('status', 'Diajukan')->where('user_id', Auth::user()->id)->count();
            $diterima = Transaksi::where('status', 'Diterima')->where('user_id', Auth::user()->id)->count();
            $ditolak = Transaksi::where('status', 'Ditolak')->where('user_id', Auth::user()->id)->count();
            $selesai = Transaksi::where('status', 'Selesai')->where('user_id', Auth::user()->id)->count();
            $penarikan = PenarikanSaldo::where('user_id', Auth::user()->id)->sum('nominal');
            $saldo = User::where('id', Auth::user()->id)->get();
            return view('nasabah.dashboard',compact(
                'diajukan',
                'ditolak',
                'diterima',
                'selesai',
                'penarikan',
                'saldo'
            ));
        } elseif (Auth::user()->hasRole('admin')) {
            $user = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->where('role_user.role_id', '2')->count();
            $artikel = Artikel::count();
            $produk = ProdukDaurUlang::count();
            $jenis_sampah = DataSampah::count();
            $diajukan = Transaksi::where('status', 'Diajukan')->count();
            $diterima = Transaksi::where('status', 'Diterima')->count();
            $ditolak = Transaksi::where('status', 'Ditolak')->count();
            $selesai = Transaksi::where('status', 'Selesai')->count();
            $penarikan = PenarikanSaldo::count();
            $sum_penarikan = PenarikanSaldo::sum('nominal');
            $penjualan_sampah = PenjualanSampah::count();
            $sum_penjualan = PenjualanSampah::sum('saldo_penjualan');
            $tps3r_masuk = SaldoTPS3R::sum('saldo_tps3r');
            $tps3r_keluar = SaldoTPS3RKeluar::sum('saldo_tps3r_keluar');
            $tps3r_user = UserTPS3R::count();
            return view('admin.dashboard_admin', compact(
                'user',
                'artikel',
                'produk',
                'jenis_sampah',
                'diajukan',
                'ditolak',
                'diterima',
                'selesai',
                'penarikan',
                'sum_penarikan',
                'penjualan_sampah',
                'sum_penjualan',
                'tps3r_masuk',
                'tps3r_keluar',
                'tps3r_user'
            ));
        }
    }
}
