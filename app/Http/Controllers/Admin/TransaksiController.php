<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSampah;
use App\Models\DetailTransaksi;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\User;
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
                ->where('status', '!=' , 'Selesai')
                ->where('status', '!=' , 'Ditolak')
                ->select(
                    'transaksis.id',
                    'transaksis.metode_penyetoran',
                    'transaksis.waktu',
                    'transaksis.tanggal',
                    'transaksis.total_berat',
                    'transaksis.kabupaten',
                    'transaksis.kecamatan',
                    'transaksis.desa',
                    'transaksis.alamat_lengkap',
                    'transaksis.no_hp',
                    'transaksis.status',
                    'transaksis.user_id',
                    'users.name'
                )
                ->get();
            return view('admin.transaksi.transaksi', compact('transaksis'));
        }
    }

    public function riwayat($id)
    {
        if (Auth::user()->hasRole('admin')) {
            $transaksis = DB::table('transaksis')
                ->join('users', 'transaksis.user_id', '=', 'users.id')
                ->where('status', '!=', 'Diterima')
                ->where('status', '!=', 'Diajukan')
                ->select(
                    'transaksis.id',
                    'transaksis.metode_penyetoran',
                    'transaksis.waktu',
                    'transaksis.tanggal',
                    'transaksis.total_berat',
                    'transaksis.kabupaten',
                    'transaksis.kecamatan',
                    'transaksis.desa',
                    'transaksis.alamat_lengkap',
                    'transaksis.no_hp',
                    'transaksis.status',
                    'transaksis.user_id',
                    'users.name'
                )
                ->where('transaksis.user_id', $id)
                ->get();
            return view('admin.riwayat.riwayat', compact('transaksis'));
        }
    }



    public function edit(Request $request)
    {
        try {
            $id = $request->input('id');
            $penerima = Transaksi::where('id', $id)->first();

            return response()->json([
                'data' => $penerima,
                'message' => 'Berhasil',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function update(Request $request)
    {
        try {
            $id = $request->input('id_edit');
            $data = [
                'status' =>  $request->input('status_edit'),
            ];

            Transaksi::where('id', $id)->update($data);

            return response()->json([
                'data' => $data,
                'message' => 'Berhasil Diedit',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function detail($id)
    {
        if (Auth::user()->hasRole('admin')) {
            $transaksis = DB::table('transaksis')
                ->join('users', 'transaksis.user_id', '=', 'users.id')
                ->where('transaksis.id', $id)
                ->select(
                    'transaksis.id',
                    'transaksis.metode_penyetoran',
                    'transaksis.waktu',
                    'transaksis.tanggal',
                    'transaksis.total_berat',
                    'transaksis.kabupaten',
                    'transaksis.kecamatan',
                    'transaksis.desa',
                    'transaksis.alamat_lengkap',
                    'transaksis.no_hp',
                    'transaksis.status',
                    'users.name',
                    'transaksis.user_id'
                )
                ->get();
            $detail_transaksi = DetailTransaksi::where('transaksi_id', $id)->get();
            $saldos = Saldo::where('transaksi_id', $id)->get();
            return view('admin.transaksi.detail-transaksi', compact('transaksis', 'detail_transaksi', 'saldos'));
        }
    }

    public function index_sampah($id, $iduser)
    {
        if (Auth::user()->hasRole('admin')) {
            if ($iduser != null && $id != null) {
                $detail_transaksis = DB::table('detail_transaksis')
                    ->join('transaksis', 'detail_transaksis.transaksi_id', '=', 'transaksis.id')
                    ->where('detail_transaksis.transaksi_id', $id)
                    ->where('transaksis.user_id', $iduser)
                    ->select('detail_transaksis.jenis_sampah', 'detail_transaksis.harga', 'detail_transaksis.berat', 'detail_transaksis.total_harga', 'detail_transaksis.id')
                    ->get();
                $namas = DB::table('transaksis')
                    ->join('users', 'transaksis.user_id', '=', 'users.id')
                    ->where('transaksis.id', $id)
                    ->select(
                        'users.name'
                    )
                    ->get();
                $sampahs = DataSampah::all();
                return view('admin.riwayat.tambah-sampah', compact('detail_transaksis',  'id', 'sampahs', 'iduser', 'namas'));
            }
        }
    }

    public function store(Request $request, $id, $iduser)
    {
        if (Auth::user()->hasRole('admin')) {

            $sampah = DataSampah::where('id', $id)->first();

            //simpan ke database detail transaksi
            $new_transaksi = Transaksi::where('user_id', $iduser)->where('status', 'Diterima')->first();

            //cek detail transaksi
            $check_transaksi_detail = DetailTransaksi::where('sampah_id', $sampah->id)->where('transaksi_id', $new_transaksi->id)->first();
            if (empty($check_transaksi_detail)) {
                $transaksi_detail = new DetailTransaksi;
                $transaksi_detail->sampah_id = $sampah->id;
                $transaksi_detail->jenis_sampah = $sampah->nama_jenisSampah;
                $transaksi_detail->transaksi_id = $new_transaksi->id;
                $transaksi_detail->berat = $request->total_berat;
                $transaksi_detail->harga = $sampah->harga;
                $transaksi_detail->total_harga = $sampah->harga * $request->total_berat;
                $transaksi_detail->save();
            } else {
                $transaksi_detail = DetailTransaksi::where('sampah_id', $sampah->id)->where('transaksi_id', $new_transaksi->id)->first();

                $transaksi_detail->berat = $transaksi_detail->berat + $request->total_berat;

                //harga sekarang
                $newPrice_transaksi_detail = $sampah->harga * $request->total_berat;
                $transaksi_detail->total_harga = $transaksi_detail->total_harga + $newPrice_transaksi_detail;
                $transaksi_detail->update();
            }

            return redirect('/tambah-sampah/' . $new_transaksi->id . '/' . $iduser);
        }
    }

    public function konfirmasi(Request $request, $id, $iduser)
    {
        $transaksi = Transaksi::where('id', $id)->where('user_id', $iduser)->first();
        $transaksi->status = $request->status;
        $detail_transaksis = DetailTransaksi::where('transaksi_id',  $id)->get();
        $jumlah = 0;
        foreach ($detail_transaksis as $detail_transaksi) {
            $jumlah += $detail_transaksi->berat;
        }
        $transaksi->total_berat = $jumlah;
        $transaksi->update();

        //cek validasi
        $check_saldo = Saldo::where('transaksi_id', $id)->first();
        //menyimpang ke database Order
        if (empty($check_saldo)) {
            $saldo = new Saldo();
            $saldo->user_id = $iduser;
            $saldo->transaksi_id = $id;
            $jumlah_saldo = 0;
            $detail_transaksis = DetailTransaksi::where('transaksi_id',  $id)->get();
            foreach ($detail_transaksis as $detail_transaksi) {
                $jumlah_saldo += $detail_transaksi->total_harga;
            }
            $saldo->saldo = $jumlah_saldo;
            $saldo->save();
        }

        $jumlah_saldo_user = 0;
        $user= User::where('id', $iduser)->first();
        $detail_transaksis = DetailTransaksi::where('transaksi_id',  $id)->get();
        foreach ($detail_transaksis as $detail_transaksi) {
            $jumlah_saldo_user += $detail_transaksi->total_harga;
        }
        $user->saldo_user = $user->saldo_user + $jumlah_saldo_user;
        $user->update();

        return redirect('transaksi/detail/' . $id);
    }

    public function delete_tambah(Request $request)
    {
        try {
            $id = $request->input('id');

            return response()->json([
                'data' => $id,
                'message' => 'Berhasil',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function destroy_tambah(Request $request)
    {
        try {
            $id = $request->input('id');
            DetailTransaksi::where('id', $id)->delete();

            return response()->json([
                'data' => $id,
                'message' => 'Berhasil Dihapus',
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
            return view('admin.riwayat.data-user', compact('user'));
        }
    }
}
