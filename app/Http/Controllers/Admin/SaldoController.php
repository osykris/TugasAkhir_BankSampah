<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\PenarikanSaldo;
use App\Models\Saldo;
use App\Models\Transaksi;
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
                ->where('saldos.user_id', $id)->where('transaksis.check_trans', '1')
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

    public function get(Request $request)
    {
        try {
            $id_user = $request->input('id');
            $penerima = User::where('id', $id_user)->first();

            return response()->json([
                'data' => $penerima,
                'message' => 'Berhasil',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file('bukti_pembayaran');
            $id = $request->input('id_edit');
            // Mendapatkan Nama File
            $nama_file = $file->getClientOriginalName();

            // Proses Upload File
            $destinationPath = 'frontend/images/Bukti-TF';

            $file->move($destinationPath, $file->getClientOriginalName());
            $store = PenarikanSaldo::create([
                'user_id' => $id,
                'nama_pengirim' => $request->input('nama_pengirim'),
                'bank' => $request->input('bank'),
                'tanggal' => $request->input('tanggal'),
                'nominal' => $request->input('saldo_user_edit'),
                'metode_penarikan' => $request->input('metode_tarik_saldo_edit'),
                'bukti_pembayaran' =>  $nama_file,
            ]);

            DB::commit();

            $data = [
                'saldo_user' =>  '0',
            ];

            User::where('id', $id)->update($data);

            $data_check = [
                'check_trans' =>  '0',
            ];
            
            Transaksi::where('user_id', $id)->update($data_check);

            return response()->json([
                'data' => $store,
                'message' => 'Berhasil Disimpan',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function riwayat_tarik($id)
    {
        if (Auth::user()->hasRole('admin')) {
            $penarikan = DB::table('penarikan_saldos')
                ->join('users', 'penarikan_saldos.user_id', '=', 'users.id')
                ->select('users.name', 'penarikan_saldos.metode_penarikan', 'penarikan_saldos.tanggal', 'penarikan_saldos.nominal', 'penarikan_saldos.bukti_pembayaran', 'penarikan_saldos.bank', 'penarikan_saldos.nama_pengirim', 'penarikan_saldos.id')
                ->where('penarikan_saldos.user_id', $id)
                ->get();
            return view('admin.saldo.riwayat-penarikan', compact('penarikan'));
        }
    }

    public function gambar(Request $request)
    {
        try {
            $id = $request->input('id');
            $penarikan = PenarikanSaldo::where('id', $id)->first();

            return response()->json([
                'data' => $penarikan,
                'message' => 'Get Data',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function data_nasabah(){
        if (Auth::user()->hasRole('admin')) {
            $user = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', '2')->get();
            return view('admin.saldo.data-user', compact('user'));
        }
    }

    public function get_cash(Request $request)
    {
        try {
            $id_user = $request->input('id');
            $penerima = User::where('id', $id_user)->first();

            return response()->json([
                'data' => $penerima,
                'message' => 'Berhasil',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function store_cash(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = $request->input('id_editt');
            $store = PenarikanSaldo::create([
                'user_id' => $id,
                'tanggal' => $request->input('tanggal'),
                'nominal' => $request->input('saldo_user_editt'),
                'metode_penarikan' => $request->input('metode_tarik_saldo_editt'),
            ]);

            DB::commit();

            $data = [
                'saldo_user' =>  '0',
            ];

            User::where('id', $id)->update($data);

            $data_check = [
                'check_trans' =>  '0',
            ];
            
            Transaksi::where('user_id', $id)->update($data_check);


            return response()->json([
                'data' => $store,
                'message' => 'Berhasil Disimpan',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }
}
