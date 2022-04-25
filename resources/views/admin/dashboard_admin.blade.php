@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Beranda Admin</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('user') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Nasabah</h4>
                        </div>
                        <div class="card-body">
                            {{ $user }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('artikel') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Artikel</h4>
                        </div>
                        <div class="card-body">
                            {{ $artikel }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('produk-daur-ulang') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Produk Daur Ulang</h4>
                        </div>
                        <div class="card-body">
                            {{ $produk }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('jenis-sampah') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-trash"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jenis Sampah</h4>
                        </div>
                        <div class="card-body">
                            {{ $jenis_sampah }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Statistik Transaksi
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $diajukan }}</div>
                            <div class="card-stats-item-label">Diajukan</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $diterima }}</div>
                            <div class="card-stats-item-label">Diterima</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $ditolak }}</div>
                            <div class="card-stats-item-label">Ditolak</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $selesai }}</div>
                            <div class="card-stats-item-label">Selesai</div>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Transaksi</h4>
                    </div>
                    @php
                    $total = 0;
                    $total = $ditolak + $diterima + $diajukan + $selesai;
                    @endphp
                    <div class="card-body">
                        {{ $total }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <a href="{{ route('penarikan-nasabah') }}">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Banyaknya Penarikan</h4>
                        </div>
                        <div class="card-body">
                            {{ $penarikan }}
                        </div>
                        <div class="card-header">
                            <h4>Total Penarikan</h4>
                        </div>
                        <div class="card-body">
                            Rp. {{ number_format($sum_penarikan)  }}
                        </div><br />
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
        <a href="{{ route('penjualan-sampah') }}">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Banyaknya Penjualan</h4>
                    </div>
                    <div class="card-body">
                        {{ $penjualan_sampah }}
                    </div>
                    <div class="card-header">
                        <h4>Total Penjualan</h4>
                    </div>
                    <div class="card-body">
                        Rp. {{ number_format($sum_penjualan)  }}
                    </div><br />
                </div>
            </div>
        </a>
        </div>
    </div>
</section>
@endsection