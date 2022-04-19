@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Saldo Nasabah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('saldo-nasabah') }}">Saldo</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Saldo Anda</h4>
                        <div class="section-header-button">
                            <a class="btn btn-primary" href="#">
                                Ajukan Metode Penarikan Saldo
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($saldo as $saldos)
                        <h2 style="color: green;">Rp. {{ number_format($saldos->saldo_user) }}</h2><br>
                        @if($saldos->saldo_user != null && $saldos->saldo_user != 0)
                        
                        
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Semua Riwayat Saldo Per Transaksi</h4>
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
                                    @foreach($riwayat_pertransaksi as $riwayat_pertransaksis)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $riwayat_pertransaksis->transaksi_id }}</td>
                                        <td>{{ $riwayat_pertransaksis->name }}</td>
                                        @if($riwayat_pertransaksis->tanggal == null)
                                        <td style="color: red;">Setiap tanggal 20/bulan</td>
                                        @else
                                        <td>{{ $riwayat_pertransaksis->tanggal }}</td>
                                        @endif
                                        <td>{{ $riwayat_pertransaksis->waktu }} WIB</td>
                                        <td>Rp. {{ number_format($riwayat_pertransaksis->saldo) }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('saldo-nasabah/detail') }}/{{ $riwayat_pertransaksis->transaksi_id }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i> Detail Pertransaksi</a>
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