<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaldoTPS3RKeluar;
use App\Models\SaldoTPS3R;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SaldoTPS3RKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(Request $request)
    {
		if (Auth::user()->hasRole('admin')) {
        $tps3r_keluars = SaldoTPS3RKeluar::all();
        $sum_tps3r_masuk = SaldoTPS3R::sum('saldo_tps3r');
        return view('admin.saldo-tps3r-keluar', compact('tps3r_keluars', 'sum_tps3r_masuk'));
		}
    }

    public function store(Request $request)
	{
		DB::beginTransaction();
		try {

			$store = SaldoTPS3RKeluar::create([
				'tgl_masuk' => $request->input('tgl_masuk'),
				'saldo_tps3r_keluar' => $request->input('saldo_tps3r_keluar'),
				'ket' => $request->input('ket'),
			]);

			DB::commit();

			return response()->json([
				'data' => $store,
				'message' => 'Berhasil Disimpan',
			], 200);
		} catch (\Throwable $th) {
			DB::rollBack();
			return $th;
		}
	}

	public function edit(Request $request)
	{
		try {
			$id_tps3r_keluar = $request->input('id');
			$penerima = SaldoTPS3RKeluar::where('id', $id_tps3r_keluar)->first();

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
				'tgl_masuk' =>  $request->input('tgl_masuk_edit'),
				'saldo_tps3r_keluar' =>  $request->input('saldo_tps3r_keluar_edit'),
				'ket' =>  $request->input('ket_edit'),
			];

			SaldoTPS3RKeluar::where('id', $id)->update($data);

			return response()->json([
				'data' => $data,
				'message' => 'Berhasil Diedit',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}

	public function delete(Request $request)
	{
		try {
			$id = $request->input('id');

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}

	public function destroy(Request $request)
	{
		try {
			$id = $request->input('id');
			SaldoTPS3RKeluar::where('id', $id)->delete();

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}
}
