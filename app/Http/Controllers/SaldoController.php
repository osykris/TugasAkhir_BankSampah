<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    public function index(){

        if (Auth::user()->hasRole('user')) {
            
        $saldo = DB::table('users')->where('id', Auth::user()->id)->get();
        $riwayat_pertransaksi = DB::table('saldos')
        ->join('transaksis', 'saldos.transaksi_id', '=', 'transaksis.id')
        ->join('users', 'users.id', '=', 'saldos.user_id')
        ->select('saldos.transaksi_id', 'saldos.user_id', 'saldos.saldo', 'transaksis.tanggal', 'transaksis.waktu', 'saldos.id', 'users.name')
        ->where('saldos.user_id', Auth::user()->id)
        ->get();
        
        return view('nasabah.saldo.saldo', compact('saldo', 'riwayat_pertransaksi'));
        }

    }

    public function pertransaksi($idtransaksi)
    {
        if (Auth::user()->hasRole('user')) {
            $detail_transaksis = DB::table('detail_transaksis')
                ->join('transaksis', 'detail_transaksis.transaksi_id', '=', 'transaksis.id')
                ->where('detail_transaksis.transaksi_id', $idtransaksi)
                ->get();
            $saldos = Saldo::where('transaksi_id', $idtransaksi)->get();
            return view('nasabah.saldo.pertransaksi', compact('detail_transaksis', 'saldos'));
        }
    }
}
