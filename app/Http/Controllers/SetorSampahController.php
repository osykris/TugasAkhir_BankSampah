<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\DetailTransaksi;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class SetorSampahController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            $transaksis = DB::table('transaksis')->where('status', 'Diajukan')
            ->where('user_id', Auth::user()->id)->get();
            return view('nasabah.setor-sampah.index', compact('transaksis'));
        }
    }

    public function detail($id)
    {
        if (Auth::user()->hasRole('user')) {
            $transaksis = Transaksi::where('id', $id)->get();
            return view('nasabah.setor-sampah.detail', compact('transaksis'));
        }
    }

    public function index_setor()
    {
        if (Auth::user()->hasRole('user')) {
            $sampahs = DataSampah::all();
            $setor = Transaksi::where('user_id', Auth::user()->id)->where('status', 'Dalam Proses')->first();
            $sampah_selected = [];
            if (!empty($setor)) {
                $sampah_selected = DetailTransaksi::where('transaksi_id', $setor->id)->get();
            }
            return view('nasabah.setor-sampah.tambah.add-setor', compact('sampahs', 'sampah_selected'));
        }
    }

    public function index_jemput()
    {
        if (Auth::user()->hasRole('user')) {
            $sampahs = DataSampah::all();
            return view('nasabah.setor-sampah.tambah.add-jemput', compact('sampahs'));
        }
    }


    public function setor(Request $request, $id)
    {
        $sampah = DataSampah::where('id', $id)->first();

        //cek validasi
        $check_setor = Transaksi::where('user_id', Auth::user()->id)->where('status', 'Dalam Proses')->first();

        //menyimpang ke database transaksi
        if (empty($check_setor)) {
            $setor = new Transaksi();
            $setor->user_id = Auth::user()->id;
            $setor->total_berat = 0;
            $setor->save();
        }

        //simpan ke database detail transaksi
        $new_setor = Transaksi::where('user_id', Auth::user()->id)->where('status', 'Dalam Proses')->first();

        //cek detail transaksi
        $check_transaksi_detail = DetailTransaksi::where('sampah_id', $sampah->id)->where('transaksi_id', $new_setor->id)->first();
        if (empty($check_transaksi_detail)) {
            $transaksi_detail = new DetailTransaksi();
            $transaksi_detail->sampah_id = $sampah->id;
            $transaksi_detail->jenis_sampah = $sampah->nama_jenisSampah;
            $transaksi_detail->transaksi_id = $new_setor->id;
            $transaksi_detail->harga = $sampah->harga;
            $transaksi_detail->save();
        }

        return redirect('add-setor');
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
            Transaksi::where('id', $id)->delete();

            return response()->json([
                'data' => $id,
                'message' => 'Berhasil Dihapus',
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function konfirmasi(Request $request)
    {
        $setor = new Transaksi();
        $setor->user_id = Auth::user()->id;
        $setor->metode_penyetoran = $request->metode_penyetoran;
        $setor->desa = $request->desa;
        $setor->no_hp = $request->no_hp;
        $setor->alamat_lengkap = $request->alamat_lengkap;
        $setor->tanggal = $request->tanggal;
        $setor->waktu = $request->waktu;
        $setor->total_berat = $request->total_berat;
        $setor->save();

        return redirect('setor-sampah');
    }

    public function edit(Request $request)
	{
		try {
			$id_setor = $request->input('id');
			$penerima = Transaksi::where('id', $id_setor)->first();

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
				'metode_penyetoran' =>  $request->input('metode_penyetoran_edit'),
				'tanggal' =>  $request->input('tanggal_edit'),
                'waktu' =>  $request->input('waktu_edit'),
                'total_berat' =>  $request->input('total_berat_edit'),
			];

			Transaksi::where('id', $id)->update($data);

			return response()->json([
				'data' => $data,
				'message' => 'Berhasil Diedit',
			], 200);
		} catch (\Throwable $th) {
			return $th;
		}
	}

    public function riwayat()
    {
        if (Auth::user()->hasRole('user')) {
            $transaksis = DB::table('transaksis')
                ->join('users', 'transaksis.user_id', '=', 'users.id')
                ->where('status', '!=', 'Diajukan')
                ->where('user_id', Auth::user()->id)
                ->select(
                    'transaksis.id',
                    'transaksis.metode_penyetoran',
                    'transaksis.waktu',
                    'transaksis.tanggal',
                    'transaksis.total_berat',
                    'transaksis.kabupaten',
                    'transaksis.kecamatan',
                    'transaksis.desa',
                    'transaksis.alamat_lengkap',
                    'transaksis.no_hp',
                    'transaksis.status',
                    'transaksis.user_id',
                    'users.name'
                )
                ->get();
            return view('nasabah.setor-sampah.riwayat.transaksi', compact('transaksis'));
        }
    }

    public function detail_transaksi($id)
    {
        if (Auth::user()->hasRole('user')) {
            $transaksis = DB::table('transaksis')
                ->join('users', 'transaksis.user_id', '=', 'users.id')
                ->where('transaksis.id', $id)
                ->where('user_id', Auth::user()->id)
                ->select(
                    'transaksis.id',
                    'transaksis.metode_penyetoran',
                    'transaksis.waktu',
                    'transaksis.tanggal',
                    'transaksis.total_berat',
                    'transaksis.kabupaten',
                    'transaksis.kecamatan',
                    'transaksis.desa',
                    'transaksis.alamat_lengkap',
                    'transaksis.no_hp',
                    'transaksis.status',
                    'users.name'
                )
                ->get();
            $detail_transaksi = DetailTransaksi::where('transaksi_id', $id)->get();
            $saldos = Saldo::where('transaksi_id', $id)->get();
            return view('nasabah.setor-sampah.riwayat.detail-riwayat', compact('transaksis', 'detail_transaksi', 'saldos'));
        }
    }

    public function cetak($id)
    {
        if (Auth::user()->hasRole('user')) {
            $transaksis = DB::table('transaksis')
                ->join('users', 'transaksis.user_id', '=', 'users.id')
                ->where('transaksis.id', $id)
                ->where('user_id', Auth::user()->id)
                ->select(
                    'transaksis.id',
                    'transaksis.metode_penyetoran',
                    'transaksis.waktu',
                    'transaksis.tanggal',
                    'transaksis.total_berat',
                    'transaksis.kabupaten',
                    'transaksis.kecamatan',
                    'transaksis.desa',
                    'transaksis.alamat_lengkap',
                    'transaksis.no_hp',
                    'transaksis.status',
                    'users.name'
                )
                ->get();
            $detail_transaksi = DetailTransaksi::where('transaksi_id', $id)->get();
            $saldos = Saldo::where('transaksi_id', $id)->get();
            $pdf = Pdf::loadView('nasabah.setor-sampah.riwayat.cetak', compact('transaksis', 'detail_transaksi', 'saldos'));
            //GENERATE PDF-NYA
            return $pdf->stream();
        }
    }
}
