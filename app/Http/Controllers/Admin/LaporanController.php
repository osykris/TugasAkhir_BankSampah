<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataSampah;
use App\Models\DetailTransaksi;
use App\Models\PenjualanSampah;
use App\Models\Transaksi;
use App\Models\SaldoTPS3R;
use App\Models\SaldoTPS3RKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function transaksiReport()
    {
        if (Auth::user()->hasRole('admin')) {
            //INISIASI 30 HARI RANGE SAAT INI JIKA HALAMAN PERTAMA KALI DI-LOAD
            //KITA GUNAKAN STARTOFMONTH UNTUK MENGAMBIL TANGGAL 1
            $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
            //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
            $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

            //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
            if (request()->date != '') {
                //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
                $date = explode(' - ', request()->date);
                $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
                $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
            }

            //BUAT QUERY KE DB MENGGUNAKAN WHEREBETWEEN DARI TANGGAL FILTER
            $sampah_masuk = DetailTransaksi::whereBetween('created_at', [$start, $end])->distinct()->get(['jenis_sampah', 'harga']);
            $jumlah_berat = DetailTransaksi::whereBetween('created_at', [$start, $end])->sum('berat');
            $jumlah_harga = DetailTransaksi::whereBetween('created_at', [$start, $end])->sum('total_harga');
            $trans = DB::table('saldos')
                ->join('users', 'saldos.user_id', '=', 'users.id')
                ->whereBetween('saldos.created_at', [$start, $end])
                ->get();

            //KEMUDIAN LOAD VIEW
            return view('admin.laporan.laporan-transaksi', compact('trans', 'sampah_masuk', 'jumlah_berat', 'jumlah_harga'));
        }
    }


    public function transaksiReportPdf($daterange)
    {
        $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
        $sampah_masuk = DetailTransaksi::whereBetween('created_at', [$start, $end])->distinct()->get(['jenis_sampah', 'harga']);
        //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
        $jumlah_berat = DetailTransaksi::whereBetween('created_at', [$start, $end])->sum('berat');
        $jumlah_harga = DetailTransaksi::whereBetween('created_at', [$start, $end])->sum('total_harga');
        $pdf = Pdf::loadView('admin.laporan.laporan-transaksi-cetak', compact('sampah_masuk', 'date', 'jumlah_berat', 'jumlah_harga'));
        //GENERATE PDF-NYA
        return $pdf->stream();
    }

    public function transaksiReportPdf_trans($daterange)
    {
        $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
        $trans = DB::table('saldos')
            ->join('users', 'saldos.user_id', '=', 'users.id')
            ->whereBetween('saldos.created_at', [$start, $end])
            ->get();
        $pdf = Pdf::loadView('admin.laporan.laporan-transaksi-nasabah-cetak', compact('trans', 'date'));
        //GENERATE PDF-NYA
        return $pdf->stream();
    }

    public function reportPenjualan($daterange)
    {
        $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
        $penjualan = PenjualanSampah::whereBetween('created_at', [$start, $end])->get();
        $total = PenjualanSampah::whereBetween('created_at', [$start, $end])->sum('saldo_penjualan');
        $pdf = Pdf::loadView('admin.laporan.laporan-penjualan-cetak', compact('penjualan', 'total', 'date'));
        //GENERATE PDF-NYA
        return $pdf->stream();
    }

    public function penjualan()
    {
        if (Auth::user()->hasRole('admin')) {
            //INISIASI 30 HARI RANGE SAAT INI JIKA HALAMAN PERTAMA KALI DI-LOAD
            //KITA GUNAKAN STARTOFMONTH UNTUK MENGAMBIL TANGGAL 1
            $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
            //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
            $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

            //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
            if (request()->date != '') {
                //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
                $date = explode(' - ', request()->date);
                $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
                $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
            }

            //BUAT QUERY KE DB MENGGUNAKAN WHEREBETWEEN DARI TANGGAL FILTER
            $penjualan = PenjualanSampah::whereBetween('created_at', [$start, $end])->get();
            $total = PenjualanSampah::whereBetween('created_at', [$start, $end])->sum('saldo_penjualan');
            //KEMUDIAN LOAD VIEW
            return view('admin.laporan.laporan-penjualan', compact('penjualan', 'total'));
        }
    }

    public function tps3rReport()
    {
        if (Auth::user()->hasRole('admin')) {
            //INISIASI 30 HARI RANGE SAAT INI JIKA HALAMAN PERTAMA KALI DI-LOAD
            //KITA GUNAKAN STARTOFMONTH UNTUK MENGAMBIL TANGGAL 1
            $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
            //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
            $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

            //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
            if (request()->date != '') {
                //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
                $date = explode(' - ', request()->date);
                $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
                $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
            }

            //BUAT QUERY KE DB MENGGUNAKAN WHEREBETWEEN DARI TANGGAL FILTER
            // $sampah_masuk = DetailTransaksi::whereBetween('created_at', [$start, $end])->distinct()->get(['jenis_sampah', 'harga']);
            // $jumlah_berat = DetailTransaksi::whereBetween('created_at', [$start, $end])->sum('berat');
            // $jumlah_harga = DetailTransaksi::whereBetween('created_at', [$start, $end])->sum('total_harga');
            
            $saldo_masuk_sebelum = SaldoTPS3R::where('created_at', '<', $start)->sum('saldo_tps3r');
            $saldo_keluar_sebelum = SaldoTPS3RKeluar::where('created_at', '<', $start)->sum('saldo_tps3r_keluar');
            $ket_masuk = SaldoTPS3R::whereBetween('created_at', [$start, $end])->get(['saldo_tps3r', 'keterangan']);
            $ket_keluar = SaldoTPS3RKeluar::whereBetween('created_at', [$start, $end])->get(['saldo_tps3r_keluar', 'ket']);
            $saldo_masuk = SaldoTPS3R::whereBetween('created_at', [$start, $end])->sum('saldo_tps3r');
            $saldo_keluar = SaldoTPS3RKeluar::whereBetween('created_at', [$start, $end])->sum('saldo_tps3r_keluar');
            
            // $trans = DB::table('saldos')
            //     ->join('users', 'saldos.user_id', '=', 'users.id')
            //     ->whereBetween('saldos.created_at', [$start, $end])
            //     ->get();

            //KEMUDIAN LOAD VIEW
            return view('admin.laporan.laporan-tps3r', compact('saldo_masuk_sebelum', 'saldo_keluar_sebelum', 'ket_masuk', 'ket_keluar', 'saldo_masuk', 'saldo_keluar'));
        }
    }

    public function tps3rReportPdf($daterange)
    {
        $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
        $saldo_masuk_sebelum = SaldoTPS3R::where('created_at', '<', $start)->sum('saldo_tps3r');
        $saldo_keluar_sebelum = SaldoTPS3RKeluar::where('created_at', '<', $start)->sum('saldo_tps3r_keluar');
        $ket_masuk = SaldoTPS3R::whereBetween('created_at', [$start, $end])->get(['saldo_tps3r', 'keterangan']);
        $ket_keluar = SaldoTPS3RKeluar::whereBetween('created_at', [$start, $end])->get(['saldo_tps3r_keluar', 'ket']);
        $saldo_masuk = SaldoTPS3R::whereBetween('created_at', [$start, $end])->sum('saldo_tps3r');
        $saldo_keluar = SaldoTPS3RKeluar::whereBetween('created_at', [$start, $end])->sum('saldo_tps3r_keluar');
        //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
        $pdf = Pdf::loadView('admin.laporan.laporan-tps3r-cetak', compact('saldo_masuk_sebelum', 'saldo_keluar_sebelum', 'ket_masuk', 'ket_keluar', 'saldo_masuk', 'saldo_keluar'));
        //GENERATE PDF-NYA
        return $pdf->stream();
    }
}
