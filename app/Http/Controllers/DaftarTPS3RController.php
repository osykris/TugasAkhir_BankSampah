<?php

namespace App\Http\Controllers;
use App\Models\UserTPS3R;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DaftarTPS3RController extends Controller
{
    public function store(Request $request)
	{
		DB::beginTransaction();
		try {
            $this->validate($request, [
                'phone' => 'required|min:10|unique:tps3r_users',
            ]);

			$store = UserTPS3R::create([
				'name_user' => $request->input('name_user'),
				'full_address' => $request->input('full_address'),
				'village' => $request->input('village'),
				'district' => $request->input('district'),
				'city' => $request->input('city'),
				'phone' => $request->input('phone'),
			]);

			DB::commit();

			// return response()->json([
			// 	'data' => $store,
			// 	'message' => 'Berhasil Disimpan',
			// ], 200);
			return redirect('/login')->with(['success' => 'Anda Terdaftar Menjadi Pengguna TPS3R']);
		} catch (\Throwable $th) {
			DB::rollBack();
			// return $th;
			return redirect('/login')->with(['error' => 'Anda Sudah Mendaftar / Nomor Anda Telah Terpakai']);
		}
	}
}
