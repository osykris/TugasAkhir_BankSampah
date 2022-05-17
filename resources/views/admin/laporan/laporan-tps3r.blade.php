@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Laporan TPS3R</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="">Laporan TPS3R</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="section-title mt-0">Laporan TPS3R</div>
                        <form class="row g-3" action="{{ route('laporan-tps3r') }}" method="get">
                            <div class="col-3">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <input type="text" id="tps3r_date" name="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary px-4" type="submit"><i class="fas fa-filter me-2"></i> Filter</button>
                                <a target="_blank" class="btn btn-success px-4" id="exportpdf_tps3r"><i class="fas fa-file-pdf me-2"></i> Cetak PDF</a>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped" id="laporan-tps3r">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Keterangan</th>
                                        <th>Saldo Masuk</th>
                                        <th>Saldo keluar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $saldo_sebelum = $saldo_masuk_sebelum - $saldo_keluar_sebelum;
                                    @endphp
                                    <tr>
                                        <th colspan="2">Saldo Sebelumnya</th>
                                        <td style="text-align:right">Rp. {{ number_format($saldo_sebelum) }}</td>
                                        <td style="text-align:right"></td>
                                    </tr>
                                    @php $no = 1; @endphp
                                    @foreach($ket_masuk as $ket_masuks)
                                    </tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $ket_masuks->keterangan }}</td>
                                    <td style="text-align:right">Rp. {{ number_format($ket_masuks->saldo_tps3r) }}</td>
                                    <td style="text-align:right"></td>
                                    </tr>
                                    @endforeach
                                    @foreach($ket_keluar as $ket_keluars)
                                    </tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $ket_keluars->ket }}</td>
                                    <td style="text-align:right"></td>
                                    <td style="text-align:right">Rp. {{ number_format($ket_keluars->saldo_tps3r_keluar) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total Saldo Masuk</th>
                                        <td style="text-align:right">Rp. {{ number_format($saldo_masuk) }}</td>
                                        <td style="text-align:right"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Total Saldo Keluar</th>
                                        <td style="text-align:right"></td>
                                        <td style="text-align:right">Rp. {{ number_format($saldo_keluar) }}</td>
                                    </tr>
                                    @php
                                    $total_saldo_masuk = $saldo_sebelum + $saldo_masuk;
                                    $sisa_saldo = $total_saldo_masuk - $saldo_keluar;
                                    @endphp
                                    <tr>
                                        <th colspan="2">Total Saldo</th>
                                        <td colspan="2" style="text-align:right">Rp. {{ number_format($sisa_saldo) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection