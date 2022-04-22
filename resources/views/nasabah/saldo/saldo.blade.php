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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Ajukan Metode Penarikan Saldo
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($saldo as $saldos)
                        @if($saldos->saldo_user != null && $saldos->saldo_user != 0)
                        <h2 style="color: green;">Rp. {{ number_format($saldos->saldo_user) }}</h2>
                        <p style="color: red;">{{ $saldos->metode_tarik_saldo }}</p>
                        <h6>Detail Saldo Anda</h6>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped" id="detail-nasabah-saldo">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th class="text-center">No. Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Saldo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($detail_saldo as $detail_saldos)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $detail_saldos->transaksi_id }}</td>
                                        @if($detail_saldos->tanggal == null)
                                        <td style="color: red;">Setiap tanggal 20/bulan</td>
                                        @else
                                        <td>{{ $detail_saldos->tanggal }}</td>
                                        @endif
                                        <td>{{ $detail_saldos->waktu }} WIB</td>
                                        <td style="color: green;"><b>Rp. {{ number_format($detail_saldos->saldo) }}</b></td>
                                        <td class="text-center">
                                            <a href="{{ url('saldo-nasabah/detail') }}/{{ $detail_saldos->transaksi_id }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i> Detail Pertransaksi</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <h2 style="color: red;">Rp. {{ number_format($saldos->saldo_user) }}</h2><br>
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
                                        @if($riwayat_pertransaksis->tanggal == null)
                                        <td style="color: red;">Setiap tanggal 20/bulan</td>
                                        @else
                                        <td>{{ $riwayat_pertransaksis->tanggal }}</td>
                                        @endif
                                        <td>{{ $riwayat_pertransaksis->waktu }} WIB</td>
                                        <td style="color: green;"><b>Rp. {{ number_format($riwayat_pertransaksis->saldo) }}</b></td>
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
<!-- Modal Pengajuan Penarikkan -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajukan Metode Penarikan Saldo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/metode-penarikan-saldo') }}/{{ Auth::user()->id }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="status_edit">Metode Penarikan Saldo</label>
                        <select class="form-control" name="metode_tarik_saldo" id="metode_tarik_saldo" required>
                            <option value="" selected disabled>Pilih Metode Penarikan</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="update-status-data">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection