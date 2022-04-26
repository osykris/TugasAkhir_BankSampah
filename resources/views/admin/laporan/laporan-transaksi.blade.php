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
                                        @php $total_semua = 'App\Models\DetailTransaksi'::sum('berat');
                                        $total_semua_harga = 'App\Models\DetailTransaksi'::sum('total_harga');
                                        @endphp
                                        <th>{{ $total_semua }} kg</th>
                                        <th>Total Harga</th>
                                        <th>Rp. {{ number_format($total_semua_harga) }}</th>
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