<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserTPS3R;
use App\Models\PembayaranTPS3R;
use App\Models\SaldoTPS3R;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PembayaranTPS3RController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')) {
			$pembayarantps3rs = UserTPS3R::all();
			return view('admin.pembayaran-tps3r', compact('pembayarantps3rs'));
		}
    }

	public function riwayat($id)
    {
        if (Auth::user()->hasRole('admin')) {
			if ($id != null) {
            $bulanans = DB::table('tps3r_pembayarans')
                ->join('tps3r_users', 'tps3r_pembayarans.tps3r_user_id', '=', 'tps3r_users.id')
                ->select('tps3r_pembayarans.*', 'tps3r_users.*')
                ->where('tps3r_pembayarans.tps3r_user_id', $id)
                ->get();
            return view('admin.pembayaran-tps3r-detail', ['bulanans' => $bulanans, 'id'=>$id]);
			}
        }
    }

    public function store(Request $request)
	{
		DB::beginTransaction();
		try {

			$store = PembayaranTPS3R::create([
				'tps3r_user_id' =>  $request->input('id'),
				'month' => $request->input('month'),
				'year' => $request->input('year'),
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
			$id_pembayarantps3r = $request->input('id_payment');
			$penerima = PembayaranTPS3R::where('id_payment', $id_pembayarantps3r)->first();

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
                'tps3r_user_id' => $request->input('tps3r_user_id_edit'),
                'month' => $request->input('month_edit'),
                'year' => $request->input('year_edit'),
            ];
            
			PembayaranTPS3R::where('id', $id)->update($data);

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
			$id = $request->input('id_payment');

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
			$id = $request->input('id_payment');
			PembayaranTPS3R::where('id_payment', $id)->delete();

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}

	public function storeOneInput(Request $request)
	{
		DB::beginTransaction();
		try {
			$store = PembayaranTPS3R::create([
				'tps3r_user_id' =>  $request->input('id_user_tps3r'),
				'month' => $request->input('month'),
				'year' => $request->input('year'),
			]);

			$store2 = SaldoTPS3R::create([
				'tanggal_input' => $request->input('tanggal_input'),
				'saldo_tps3r' => $request->input('saldo_tps3r'),
				'keterangan' => $request->input('keterangan'),
			]);

			DB::commit();
			
			return response()->json([
				'data' => [$store, $store2],
				'message' => 'Berhasil Disimpan',
			], 200);
		} catch (\Throwable $th) {
			DB::rollBack();
			return $th;
		}
	}
}
