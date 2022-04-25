@extends('layouts.app-dashboard')

@section('content')

<?php $user_id = 0; ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('pembayaran-tps3r') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Pembayaran TPS3R</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Pembayaran Bulanan <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="pembayaran-tps3r-detail">Detail Pembayaran TPS3R</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="bulanan-tps3r">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama Pengguna Jasa</th>
                                        <th>Waktu Pembayaran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($bulanans as $bulanan)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $bulanan->name_user }}</td>
                                        <td>{{ $bulanan->month }} {{ $bulanan->year }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit_bulanantps3r('{{ $bulanan->id_payment }}')" id="edit-bulanantps3r"><i class="fas fa-edit me-2"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_bulanantps3r('{{ $bulanan->id_payment }}')"><i class='fas fa-times'></i></button>
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

<!-- Modal Tambah Bulanan TPS3R -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembayaran Bulanan TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-bulanantps3r">
                    <input type="hidden" name="id" id="id" value="{{ $id }}">
                    <div class="form-group">
                        <label>Bulan</label>
                        <select class="form-control selectric" name="month" id="month">
                            <option value="Pilih Desa" disabled selected>Pilih Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Tahun</label>
                        <input type="text" class="form-control" placeholder="Masukkan Tahun" name="year" id="year">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-bulanantps3r">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-pembayarantps3r">+ Tambah Pembayaran</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Bulanan TPS3R -->
<div class="modal fade" id="ModalBulananTPS3RUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pembayaran Bulanan TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-bulanantps3r-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <input type="hidden" class="form-control" value="{{ $user_id }}" placeholder="Masukkan ID User" name="tps3r_user_id_edit" id="tps3r_user_id_edit">
                    <div class="form-group">
                        <label>Bulan</label>
                        <select class="form-control selectric" name="month_edit" id="month_edit">
                            <option value="Pilih Desa" disabled selected>Pilih Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year_edit">Tahun</label>
                        <input type="text" class="form-control" placeholder="Masukkan Tahun" name="year_edit" id="year_edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-bulanantps3r-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-bulanantps3r">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Bulanan TPS3R -->
<div class="modal fade" id="ModalHapusBulananTPS3R" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Pembayaran Bulanan TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data Pembayaran Bulanan TPS3R?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-bulanantps3r">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection