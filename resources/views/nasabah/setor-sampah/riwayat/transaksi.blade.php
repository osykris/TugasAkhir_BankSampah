@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Riwayat Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('riwayat-transaksi') }}">Semua Riwayat</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Semua Riwayat</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="riwayat">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama</th>
                                        <th>Metode Penyetoran</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($transaksis as $transaksi)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $transaksi->name }}</td>
                                        <td>{{ $transaksi->metode_penyetoran }}</td>
                                        @if($transaksi->metode_penyetoran == 'Setor Sampah')
                                        <td>{{ $transaksi->tanggal }}</td>
                                        @else
                                        <td style="color: red;">Setiap tanggal 20/bulan</td>
                                        @endif
                                        <td>{{ $transaksi->waktu }} WIB</td>
                                        <td>
                                            @if($transaksi->status == 'Diterima')
                                            <div class="badge badge-success">{{ $transaksi->status }}</div>
                                            @elseif($transaksi->status == 'Ditolak')
                                            <div class="badge badge-danger">{{ $transaksi->status }}</div>
                                            @else
                                            <div class="badge badge-info">{{ $transaksi->status }}</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="buttons">
                                                <a href="{{ url('riwayat-transaksi/detail') }}/{{ $transaksi->id }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                                                @if($transaksi->status == 'Diterima')
                                                <a href="{{ url('tambah-sampah') }}/{{ $transaksi->id }}/{{ $transaksi->user_id }}" class="btn btn-icon icon-left btn-info"><i class="fas fa-plus"></i> Sampah</a>
                                                @endif
                                            </div>
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