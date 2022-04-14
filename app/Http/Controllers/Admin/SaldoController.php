<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Saldo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $user = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->where('role_user.role_id', '2')->get();
            return view('admin.saldo.saldo', compact('user'));
        }
    }

    public function detail_saldo($id)
    {
        if (Auth::user()->hasRole('admin')) {
            $detail_saldos = DB::table('saldos')
                ->join('transaksis', 'saldos.transaksi_id', '=', 'transaksis.id')
                ->join('users', 'users.id', '=', 'saldos.user_id')
                ->select('saldos.transaksi_id', 'saldos.user_id', 'saldos.saldo', 'transaksis.tanggal', 'transaksis.waktu', 'saldos.id', 'users.name')
                ->where('saldos.user_id', $id)
                ->get();
            return view('admin.saldo.detail', compact('detail_saldos'));
        }
    }

    public function pertransaksi($id, $idtransaksi)
    {
        if (Auth::user()->hasRole('admin')) {
            $detail_transaksis = DB::table('detail_transaksis')
                ->join('transaksis', 'detail_transaksis.transaksi_id', '=', 'transaksis.id')
                ->where('detail_transaksis.transaksi_id', $idtransaksi)
                ->where('transaksis.user_id', $id)
                ->get();
            $saldos = Saldo::where('transaksi_id', $idtransaksi)->get();
            return view('admin.saldo.pertransaksi', compact('detail_transaksis', 'saldos'));
        }
    }
}
