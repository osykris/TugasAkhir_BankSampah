@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Riwayat Penarikan Saldo</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="">Riwayat Penarikan</a></div>
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
                            <table class="table table-striped" id="riwayat-tarik">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama Pengirim</th>
                                        <th>Bank Pengirim</th>
                                        <th>Bank Tujuan</th>
                                        <th>No. Rekening Tujuan</th>
                                        <th>Tanggal</th>
                                        <th>Nominal</th>
                                        <th>Metode Penarikan</th>
                                        <th class="text-center">Bukti Transfer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($penarikan as $penarikans)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $penarikans->nama_pengirim }}</td>
                                        <td>{{ $penarikans->bank_pengirim }}</td>
                                        <td>{{ $penarikans->bank }}</td>
                                        <td>{{ $penarikans->norek }}</td>
                                        <td>{{ $penarikans->tanggal }}</td>
                                        <td>
                                            <div class="badge badge-success">Rp. {{ number_format($penarikans->nominal) }}</div>
                                        </td>
                                        <td>{{ $penarikans->metode_penarikan }}</td>
                                        <td class="text-center">
                                        @if($penarikans->metode_penarikan == "Transfer Bank")
                                            <button onclick="gambar('{{ $penarikans->id }}')" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Bukti Transfer</button>
                                       @endif
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
<!-- Modal Menampilkan Bukti Transfer -->
<div class="modal fade" id="modalBukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bukti Transfer Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bukti">

            </div>
        </div>
    </div>
</div>
@endsection