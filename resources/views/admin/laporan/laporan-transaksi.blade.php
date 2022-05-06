@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Laporan Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="">Laporan Transaksi</a></div>
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

                        <div class="section-title mt-0">Laporan Sampah Masuk</div>
                        <form class="row g-3" action="{{ route('laporan-transaksi') }}" method="get">
                            <div class="col-3">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <input type="text" id="created_at" name="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary px-4" type="submit"><i class="fas fa-filter me-2"></i> Filter</button>
                                <a target="_blank" class="btn btn-success px-4" id="exportpdf"><i class="fas fa-file-pdf me-2"></i> Cetak PDF</a>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped" id="laporan-transaksi">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama Jenis Sampah</th>
                                        <th>Total Berat</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($sampah_masuk as $sampah_masuks)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $sampah_masuks->jenis_sampah }}</td>
                                        @php $total_berat = 'App\Models\DetailTransaksi'::where('jenis_sampah', $sampah_masuks->jenis_sampah)->sum('berat');
                                        @endphp
                                        <td>{{ $total_berat }} kg</td>
                                        <td>Rp. {{ number_format($sampah_masuks->harga) }}</td>
                                        @php
                                        $total_harga = $total_berat * $sampah_masuks->harga;
                                        @endphp
                                        <td>
                                            Rp. {{ number_format($total_harga) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                        <th>Total Berat</th>
                                        <th>{{ $jumlah_berat }} kg</th>
                                        <th>Total Harga</th>
                                        <th>Rp. {{ number_format($jumlah_harga) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

                        <div class="section-title mt-0">Laporan Transaksi Nasabah</div>
                        <form class="row g-3" action="{{ route('laporan-transaksi') }}" method="get">
                            <div class="col-3">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <input type="text" id="created_at_trans" name="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary px-4" type="submit"><i class="fas fa-filter me-2"></i> Filter</button>
                                <a target="_blank" class="btn btn-success px-4" id="exportpdf_trans"><i class="fas fa-file-pdf me-2"></i> Cetak PDF</a>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped" id="trans">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama</th>
                                        <th>Jenis Sampah</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($trans as $tr)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $tr->name }}</td>
                                        @php
                                        $detail = 'Illuminate\Support\Facades\DB'::table('detail_transaksis')
                                        ->join('saldos', 'detail_transaksis.transaksi_id', '=', 'saldos.transaksi_id')
                                        ->where('saldos.user_id', $tr->user_id)->get();
                                        @endphp
                                        <td>
                                            @foreach($detail as $dt)
                                            <ul>
                                                <li>
                                                <b>{{ $dt->jenis_sampah }} = </b> 
                                                {{ $dt->berat }} kg x Rp. {{ number_format($dt->harga) }} = Rp. {{ number_format($dt->total_harga) }}
                                                </li>
                                            </ul>
                                            @endforeach
                                        </td>
                                        <td>
                                            Rp. {{ number_format($tr->saldo) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection