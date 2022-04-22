@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            @foreach($transaksis as $transaksi)
            @if($transaksi->status == 'Diajukan')
            <a href="{{ route('transaksi-masuk') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            @else
            <a href="{{ url('riwayat-transaksiNasabah/detail') }}/{{ $transaksi->user_id }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            @endif
            @endforeach
        </div>
        <h1>Detail Setor</h1>
        <div class="section-header-breadcrumb">
        @foreach($transaksis as $transaksi)
            @if($transaksi->status == 'Diajukan')
            <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('transaksi-masuk') }}">Semua Setoran</a></div>
            <div class="breadcrumb-item active"><a href="#">Detail Setor</a></div>
            @else
            <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('riwayat-transaksiNasabah') }}">Semua Riwayat Nasabah</a></div>
            <div class="breadcrumb-item"><a href="">Detail Riwayat</a></div>
            <div class="breadcrumb-item active"><a href="">Detail Transaksi</a></div>
            @endif
            @endforeach
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                <h4>Detail</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        @foreach($transaksis as $transaksi)
                        <tr>
                            <td>Nama</td>
                            <td width="10">:</td>
                            <td>{{ $transaksi->name }}</td>
                        </tr>
                        <tr>
                            <td>Metode Penyetoran</td>
                            <td>:</td>
                            <td>{{ $transaksi->metode_penyetoran }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $transaksi->alamat_lengkap }}, {{ $transaksi->desa }}, {{ $transaksi->kecamatan }}, {{ $transaksi->kabupaten }}</td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td>:</td>
                            <td>{{ $transaksi->no_hp }}</td>
                        </tr>
                        @if($transaksi->metode_penyetoran == 'Setor Sampah')
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>{{ $transaksi->tanggal }}</td>
                        </tr>
                        @else
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td style="color: red;">Setiap tanggal 20/bulan</td>
                        </tr>
                        @endif
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td>{{ $transaksi->waktu }} WIB</td>
                        </tr>
                        <tr>
                            <td>Perkiraan Total Berat</td>
                            <td>:</td>
                            <td>{{ $transaksi->total_berat }} kg</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($transaksis as $transaksis)
        @if($transaksi->status == 'Selesai')
        <div class="card">
            <div class="card-header">
                <h4>List Sampah</h4>
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
                        @foreach($detail_transaksi as $detail_transaksis)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $detail_transaksis->jenis_sampah }}</td>
                            <td>Rp {{ number_format($detail_transaksis->harga) }}</td>
                            <td>{{ $detail_transaksis->berat }} kg</td>
                            <td>Rp {{ number_format($detail_transaksis->total_harga) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="background-color: #6777ef;">
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="font-weight: bold; font-size:larger; color: white;">Total</td>
                            <td style="font-weight: bold; font-size:larger; color: white;">{{ $transaksi->total_berat }} kg</td>
                            @foreach($saldos as $saldo)
                            <td style="font-weight: bold; font-size:larger; color: white;">Rp. {{number_format($saldo->saldo)}}</td>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        @else
        <h6 style="color: red;">Belum Ada Jenis Sampah</h6>
        @endif
        @endforeach
    </div>
</section>
@endsection