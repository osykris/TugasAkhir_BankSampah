@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Laporan Penjualan Sampah Kepada Pengepul</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="">Laporan Penjualan Sampah Kepada Pengepul</a></div>
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

                        <div class="section-title mt-0">Laporan Penjualan Ke Pengepul</div>
                        <form class="row g-3" action="{{ route('laporan-penjualan') }}" method="get">
                            <div class="col-3">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <input type="text" id="penjualan" name="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary px-4" type="submit"><i class="fas fa-filter me-2"></i> Filter</button>
                                <a target="_blank" class="btn btn-success px-4" id="exportpdf_penj"><i class="fas fa-file-pdf me-2"></i> Cetak PDF</a>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped" id="laporan-transaksi">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Tanggal Penjualan</th>
                                        <th>Saldo Masuk</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($penjualan as $pj)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $pj->date_input }}</td>
                                        <td>Rp. {{ number_format($pj->saldo_penjualan) }}</td>
                                        <td>{{ $pj->description }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                 <tfoot>
                                    <td></td>
                                    <td><b>Total Saldo</b></td>
                                    <td><b>Rp. {{ number_format($total) }}</b></td>
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