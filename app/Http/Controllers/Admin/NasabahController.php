<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NasabahController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $users = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', '2')->get();
            return view('admin.user', compact('users'));
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
			User::where('id', $id)->delete();

			return response()->json([
				'data' => $id,
				'message' => 'Berhasil Dihapus',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}

	public function cetak()
    {
		$users = DB::table('users')
		->join('role_user', 'users.id', '=', 'role_user.user_id')
		->where('role_user.role_id', '2')->get();
        //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
        $pdf = Pdf::loadView('admin.user-cetak', compact('users'))->setPaper('a4', 'landscape');;
        //GENERATE PDF-NYA
        return $pdf->stream();
    }
}
