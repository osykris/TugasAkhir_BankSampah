<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		if (Auth::user()->hasRole('admin')) {
			// $artikels = Artikel::all();
			$artikels = DB::table('artikels')
				->join('users', 'artikels.user_id', '=', 'users.id')
				->select('artikels.*', 'users.name')
				->get();
			return view('admin.artikel', compact('artikels'));
		}
	}

	public function store(Request $request)
	{
		DB::beginTransaction();
		try {
			$this->validate($request, [
				'gambar_artikel' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
			]);

			//upload image
			$gambar = $request->file('gambar_artikel');
			$nama_gambar = $gambar->getClientOriginalName();
			$path = "frontend/images/Artikel";
			$gambar->move($path, $nama_gambar);

			$store = Artikel::create([
				// 'user_id' => $request->input('user_id'),
				'user_id' => Auth::user()->id,
				'title' => $request->input('title'),
				'content' => $request->input('content'),
				'gambar_artikel' => $nama_gambar,
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
			$penerima = Artikel::where('id', $id_products)->first();

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
			if ($request->file('gambar_artikel_edit')) {
				
				//upload new image
				$gambar = $request->file('gambar_artikel_edit');
				$nama_gambar = $gambar->getClientOriginalName();
				$path = "frontend/images/Artikel";
				$gambar->move($path, $nama_gambar);

				$data = [
					// 'user_id' => $request->input('user_id_edit'),
					'user_id' => Auth::user()->id,
					'title' => $request->input('title_edit'),
					'content' => $request->input('content_edit'),
					'gambar_artikel' => $nama_gambar,
				];

				Artikel::where('id', $id)->update($data);
			} else {
				$data = [
					// 'user_id' => $request->input('user_id_edit'),
					'user_id' => Auth::user()->id,
					'title' => $request->input('title_edit'),
					'content' => $request->input('content_edit'),
				];

				Artikel::where('id', $id)->update($data);
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
			
			Artikel::where('id', $id)->delete();

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}
}
