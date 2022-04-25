@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Beranda Nasabah</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Riwayat Transaksi
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
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Saldo</h4>
                        </div>
                        @foreach($saldo as $saldos)
                        <div class="card-body">
                        Rp. {{ number_format($saldos->saldo_user)  }}
                        </div>
                        @endforeach
                        <div class="card-header">
                            <h4>Riwayat Penarikan</h4>
                        </div>
                        <div class="card-body">
                            Rp. {{ number_format($penarikan)  }}
                        </div><br />
                    </div>
                </div>
        </div>
    </div>
</section>
@endsection