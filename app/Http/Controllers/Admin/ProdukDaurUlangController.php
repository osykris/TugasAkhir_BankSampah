<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukDaurUlang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Test;

class ProdukDaurUlangController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		if (Auth::user()->hasRole('admin')) {
			// $products = ProdukDaurUlang::all();
			$products = DB::table('produk_daur_ulangs')
				->join('users', 'produk_daur_ulangs.user_id', '=', 'users.id')
				->select('produk_daur_ulangs.*', 'users.name')
				->get();
			return view('admin.produk-daur-ulang', compact('products'));
		}
	}

	public function store(Request $request)
	{
		DB::beginTransaction();
		try {
			$this->validate($request, [
				'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
			]);

			//upload image
			$gambar = $request->file('gambar');
			$nama_gambar = $gambar->getClientOriginalName();
			$path = "frontend/images/Produk";
			$gambar->move($path, $nama_gambar);

			$store = ProdukDaurUlang::create([
				// 'user_id' => $request->input('user_id'),
				'user_id' => Auth::user()->id,
				'nama' => $request->input('nama'),
				'deskripsi' => $request->input('deskripsi'),
				'harga' => $request->input('harga'),
				'gambar' => $nama_gambar,
				'link' => $request->input('link'),
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
			$id_products = $request->input('id');
			$penerima = ProdukDaurUlang::where('id', $id_products)->first();

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
			if ($request->file('gambar_edit')) {
				
				//upload new image
				$gambar = $request->file('gambar_edit');
				$nama_gambar = $gambar->getClientOriginalName();
				$path = "frontend/images/Produk";
				$gambar->move($path, $nama_gambar);

				$data = [
					// 'user_id' => $request->input('user_id_edit'),
					'user_id' => Auth::user()->id,
					'nama' => $request->input('nama_edit'),
					'deskripsi' => $request->input('deskripsi_edit'),
					'harga' => $request->input('harga_edit'),
					'gambar' => $nama_gambar,
					'link' => $request->input('link_edit'),
				];

				ProdukDaurUlang::where('id', $id)->update($data);
			} else {
				$data = [
					// 'user_id' => $request->input('user_id_edit'),
					'user_id' => Auth::user()->id,
					'nama' => $request->input('nama_edit'),
					'deskripsi' => $request->input('deskripsi_edit'),
					'harga' => $request->input('harga_edit'),
					'link' => $request->input('link_edit'),
				];

				ProdukDaurUlang::where('id', $id)->update($data);
			}

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
			
			ProdukDaurUlang::where('id', $id)->delete();

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}
}
