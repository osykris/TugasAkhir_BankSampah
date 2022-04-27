<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $sampah_masuk = DetailTransaksi::distinct()->get(['jenis_sampah', 'harga']);
            return view('admin.laporan.laporan-transaksi', compact('sampah_masuk'));
        }
    }

    public function transaksiReport()
    {
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
        //KEMUDIAN LOAD VIEW
        return view('admin.laporan.laporan-transaksi', compact('sampah_masuk','jumlah_berat', 'jumlah_harga'));
    }

    public function transaksiReportPdf($daterange)
    {
        $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
        $sampah_masuk = Transaksi::with(['customer.district'])->whereBetween('created_at', [$start, $end])->get();
        //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
        $pdf = PDF::loadView('report.order_pdf', compact('sampah_masuk', 'date'));
        //GENERATE PDF-NYA
        return $pdf->stream();
    }
}