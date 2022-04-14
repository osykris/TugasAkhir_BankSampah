<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaldoTPS3R;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SaldoTPS3RController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(Request $request)
    {
		if (Auth::user()->hasRole('admin')) {
        $tps3rs = SaldoTPS3R::all();
        return view('admin.saldo-tps3r', compact('tps3rs'));
		}
    }

    public function store(Request $request)
	{
		DB::beginTransaction();
		try {

			$store = SaldoTPS3R::create([
				'tanggal_input' => $request->input('tanggal_input'),
				'saldo' => $request->input('saldo'),
				'keterangan' => $request->input('keterangan'),
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
			$id_tps3r = $request->input('id');
			$penerima = SaldoTPS3R::where('id', $id_tps3r)->first();

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
				'tanggal_input' =>  $request->input('tanggal_input_edit'),
				'saldo' =>  $request->input('saldo_edit'),
				'keterangan' =>  $request->input('keterangan_edit'),
			];

			SaldoTPS3R::where('id', $id)->update($data);

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
			SaldoTPS3R::where('id', $id)->delete();

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}
}
