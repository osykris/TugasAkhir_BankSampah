@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ url('saldo-nasabah') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Pertransaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('saldo-nasabah') }}">Saldo</a></div>
            @foreach($saldos as $saldo)
            <div class="breadcrumb-item active"><a href="{{ url('saldo-nasabah/detail') }}/{{ $saldo->transaksi_id }}">Detail Pertransaksi</a></div>
            @endforeach
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>List Transaksi</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="detail">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Jenis Sampah</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($detail_transaksis as $detail_transaksi)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $detail_transaksi->jenis_sampah }}</td>
                            <td>Rp {{ number_format($detail_transaksi->harga) }}</td>
                            <td>{{ $detail_transaksi->berat }} kg</td>
                            <td>Rp {{ number_format($detail_transaksi->total_harga) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="background-color: #6777ef;">
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bold; font-size:larger; color: white;">Total</td>
                            <td style="font-weight: bold; font-size:larger; color: white;">{{ $detail_transaksi->total_berat }} kg</td>
                            @foreach($saldos as $saldo)
                            <td style="font-weight: bold; font-size:larger; color: white;">Rp. {{number_format($saldo->saldo)}}</td>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection