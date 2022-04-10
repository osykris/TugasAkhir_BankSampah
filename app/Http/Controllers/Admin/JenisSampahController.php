<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JenisSampahController extends Controller
{
    public function index(Request $request)
    {
		if (Auth::user()->hasRole('admin')) {
        $sampahs = DataSampah::all();
        return view('admin.jenis-sampah', compact('sampahs'));
		}
    }

    public function store(Request $request)
	{
		DB::beginTransaction();
		try {

			$store = DataSampah::create([
				'nama_jenisSampah' => $request->input('nama_jenisSampah'),
				'harga' => $request->input('harga'),
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
			$id_sampah = $request->input('id');
			$penerima = DataSampah::where('id', $id_sampah)->first();

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
				'nama_jenisSampah' =>  $request->input('nama_jenisSampah_edit'),
				'harga' =>  $request->input('harga_edit'),
			];

			DataSampah::where('id', $id)->update($data);

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
			DataSampah::where('id', $id)->delete();

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}
}
