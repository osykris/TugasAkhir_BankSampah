<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserTPS3R;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserTPS3RController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(Request $request)
    {
		if (Auth::user()->hasRole('admin')) {
        $usertps3rs = UserTPS3R::all();
        return view('admin.pengguna-tps3r', compact('usertps3rs'));
		}
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

	public function edit(Request $request)
	{
		try {
			$id_usertps3r = $request->input('id');
			$penerima = UserTPS3R::where('id', $id_usertps3r)->first();

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
                'name_user' => $request->input('name_user_edit'),
                'full_address' => $request->input('full_address_edit'),
                'village' => $request->input('village_edit'),
                'district' => $request->input('district_edit'),
                'city' => $request->input('city_edit'),
                'phone' => $request->input('phone_edit'),
            ];
            
			UserTPS3R::where('id', $id)->update($data);

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
			UserTPS3R::where('id', $id)->delete();

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}
}
