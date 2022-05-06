<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenjualanSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenjualanSampahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(Request $request)
    {
		if (Auth::user()->hasRole('admin')) {
        $jualsampahs = PenjualanSampah::all();
		$total = PenjualanSampah::sum('saldo_penjualan');
        return view('admin.penjualan-sampah', compact('jualsampahs', 'total'));
		}
    }

    public function store(Request $request)
	{
		DB::beginTransaction();
		try {

			$store = PenjualanSampah::create([
				'date_input' => $request->input('date_input'),
				'saldo_penjualan' => $request->input('saldo_penjualan'),
				'description' => $request->input('description'),
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
			$id_jualsampah = $request->input('id');
			$penerima = PenjualanSampah::where('id', $id_jualsampah)->first();

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
				'date_input' =>  $request->input('date_input_edit'),
				'saldo_penjualan' =>  $request->input('saldo_penjualan_edit'),
				'description' =>  $request->input('description_edit'),
			];

			PenjualanSampah::where('id', $id)->update($data);

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
			PenjualanSampah::where('id', $id)->delete();

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}
}
