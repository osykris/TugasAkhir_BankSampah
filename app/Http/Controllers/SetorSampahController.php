<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SetorSampahController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transaksis = Transaksi::where('status', 'Diajukan')->get();
        return view('nasabah.setor-sampah.index', compact('transaksis'));
    }

    public function detail($id)
    {
        $transaksis = Transaksi::where('id', $id)->get();
        return view('nasabah.setor-sampah.detail', compact('transaksis'));
    }

    public function index_setor()
    {
        $sampahs = DataSampah::all();
        $setor = Transaksi::where('user_id', Auth::user()->id)->where('status','Dalam Proses')->first();
        $sampah_selected = [];
        if(!empty($setor))
        {
            $sampah_selected = DetailTransaksi::where('transaksi_id', $setor->id)->get();

        }
        return view('nasabah.setor-sampah.tambah.add-setor', compact('sampahs', 'sampah_selected'));
    }

    public function index_jemput()
    {
        $sampahs = DataSampah::all();
        return view('nasabah.setor-sampah.tambah.add-jemput', compact('sampahs'));
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

    public function hapus_sampah($id)
    {
        $transaksi_detail = DetailTransaksi::where('id', $id)->first();
        $transaksi_detail->delete();
        $sampahs = DataSampah::all();
        $setor = Transaksi::where('user_id', Auth::user()->id)->where('status','Dalam Proses')->first();
        $sampah_selected = [];
        if(!empty($setor))
        {
            $sampah_selected = DetailTransaksi::where('transaksi_id', $setor->id)->get();

        }
        return redirect('add-setor');
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
}
