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
                                            <div class="badge badge-warning">{{ $transaksi->status }}</div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-info" onclick="edit_statuss('{{ $transaksi->id }}')" id="update-status"><i class="fas fa-edit"></i></button>
                                            <a href="{{ url('transaksi/detail') }}/{{ $transaksi->id }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
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
<!-- Modal Update Status -->
<div class="modal fade" id="ModalStatusUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Status Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-status-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="status_edit">Status</label>
                        <select name="status_edit" class="form-control" id="status_edit">
                            <option value="" selected disabled>Pilih Status Transaksi</option>
                            <option value="Diajukan">Diajukan</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-status-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-status-data">Update Data</button>
            </div>
        </div>
    </div>
</div>
@endsection