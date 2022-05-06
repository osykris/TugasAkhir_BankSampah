<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function transaksiReport()
    {
        if (Auth::user()->hasRole('user')) {
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
            $trans = DB::table('saldos')
                ->join('users', 'saldos.user_id', '=', 'users.id')
                ->whereBetween('saldos.created_at', [$start, $end])
                ->where('saldos.user_id', Auth::user()->id)
                ->get();

            //KEMUDIAN LOAD VIEW
            return view('nasabah.laporan.index', compact('trans',));
        }
    }


    public function transaksiReportPdf($daterange)
    {
        $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
        $trans = DB::table('saldos')
        ->join('users', 'saldos.user_id', '=', 'users.id')
        ->whereBetween('saldos.created_at', [$start, $end])
        ->where('saldos.user_id', Auth::user()->id)
        ->get();
        //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
        $pdf = Pdf::loadView('nasabah.laporan.cetak', compact('trans', 'date'));
        //GENERATE PDF-NYA
        return $pdf->stream();
    }
}
