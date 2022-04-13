<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSampah;
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
            ->where('status', 'Diajukan')
            ->select('transaksis.id', 'transaksis.metode_penyetoran', 'transaksis.waktu', 'transaksis.tanggal', 'transaksis.total_berat', 'transaksis.kabupaten', 'transaksis.kecamatan', 'transaksis.desa', 'transaksis.alamat_lengkap', 'transaksis.no_hp', 'transaksis.status'
            , 'users.name')
            ->get();
        return view('admin.transaksi.transaksi', compact('transaksis'));
		}
    }

	public function riwayat()
    {
		if (Auth::user()->hasRole('admin')) {
            $transaksis = DB::table('transaksis')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
			->where('status', '!=', 'Diajukan')
            ->select('transaksis.id', 'transaksis.metode_penyetoran', 'transaksis.waktu', 'transaksis.tanggal', 'transaksis.total_berat', 'transaksis.kabupaten', 'transaksis.kecamatan', 'transaksis.desa', 'transaksis.alamat_lengkap', 'transaksis.no_hp', 'transaksis.status'
            , 'users.name')
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
            ->select('transaksis.id', 'transaksis.metode_penyetoran', 'transaksis.waktu', 'transaksis.tanggal', 'transaksis.total_berat', 'transaksis.kabupaten', 'transaksis.kecamatan', 'transaksis.desa', 'transaksis.alamat_lengkap', 'transaksis.no_hp', 'transaksis.status'
            , 'users.name')
            ->get();
            return view('admin.transaksi.detail-transaksi', compact('transaksis'));
        }
    }

	public function index_sampah($id)
    {
        if (Auth::user()->hasRole('admin')) {
			$detail_transaksis = DB::table('detail_transaksis')
            ->join('transaksis', 'detail_transaksis.transaksi_id', '=', 'transaksis.id')
			->where('detail_transaksis.transaksi_id', $id)
            ->get();
			$sampahs = DataSampah::all();
            return view('admin.riwayat.tambah-sampah', compact('detail_transaksis', 'sampahs'));
        }
    }

	public function store($id)
    {
        if (Auth::user()->hasRole('admin')) {
			
        }
    }

}
