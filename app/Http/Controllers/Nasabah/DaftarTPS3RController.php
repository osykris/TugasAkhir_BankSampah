<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use App\Models\UserTPS3R;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DaftarTPS3RController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
	{
		DB::beginTransaction();
		try {

			$store = UserTPS3R::create([
				'name_user' => $request->input('name_user'),
				'full_address' => $request->input('full_address'),
				'village' => $request->input('village'),
				'district' => $request->input('district'),
				'city' => $request->input('city'),
				'phone' => $request->input('phone'),
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
}
