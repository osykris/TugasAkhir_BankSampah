@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('saldo') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Saldo Nasabah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('saldo') }}">Semua Saldo</a></div>
            <div class="breadcrumb-item"><a href="#">Detail Saldo</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Saldo</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="saldo">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th class="text-center">No. Transaksi</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Saldo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($detail_saldos as $detail_saldo)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $detail_saldo->transaksi_id }}</td>
                                        <td>{{ $detail_saldo->name }}</td>
                                        @if($detail_saldo->tanggal == null)
                                        <td style="color: red;">Setiap tanggal 20/bulan</td>
                                        @else
                                        <td>{{ $detail_saldo->tanggal }}</td>
                                        @endif
                                        <td>{{ $detail_saldo->waktu }} WIB</td>
                                        <td>Rp. {{ number_format($detail_saldo->saldo) }}</td>
                                        <td class="text-center">
                                        <a href="{{ url('saldo/detail') }}/{{ $detail_saldo->user_id }}/{{ $detail_saldo->transaksi_id }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i> Detail Pertransaksi</a>
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