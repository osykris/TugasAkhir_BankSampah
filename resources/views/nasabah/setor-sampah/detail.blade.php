@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('setor-sampah') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Setor</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setor-sampah') }}">Semua Setoran</a></div>
            <div class="breadcrumb-item active"><a href="#">Detail Setor</a></div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        @foreach($transaksis as $transaksi)
                        <tr>
                            <td>Nama</td>
                            <td width="10">:</td>
                            <td>{{ Auth::user()->name }}</td>
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
                            <td>Total Berat</td>
                            <td>:</td>
                            <td>{{ $transaksi->total_berat }} kg</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection