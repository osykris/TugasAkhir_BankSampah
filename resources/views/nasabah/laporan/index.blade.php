@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Laporan Transaksi Nasabah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="">Laporan Transaksi Nasabah</a></div>
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

                        <div class="section-title mt-0">Laporan Transaksi Nasabah</div>
                        <form class="row g-3" action="{{ route('laporan-nasabah') }}" method="get">
                            <div class="col-3">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <input type="text" id="nas_date" name="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary px-4" type="submit"><i class="fas fa-filter me-2"></i> Filter</button>
                                <a target="_blank" class="btn btn-success px-4" id="exportpdf_nas"><i class="fas fa-file-pdf me-2"></i> Cetak PDF</a>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped" id="trans">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Jenis Sampah</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($trans as $tr)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
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