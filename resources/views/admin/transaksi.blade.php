@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('transaksi-masuk') }}">Semua Transaksi Masuk</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Semua Transaksi Masuk</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="transaksi-masuk">
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
                                            <div class="badge badge-info">{{ $transaksi->status }}</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="{{ url('setor-sampah/detail') }}/{{ $transaksi->id }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
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