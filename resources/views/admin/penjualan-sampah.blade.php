@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Penjualan Sampah</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Penjualan Sampah<i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="penjualan-sampah">Penjualan Sampah</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="penjualansampah">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Tanggal Penjualan</th>
                                        <th>Saldo</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($jualsampahs as $jualsampah)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $jualsampah->date_input }}</td>
                                        <td>Rp. {{ number_format($jualsampah->saldo_penjualan) }}</td>
                                        <td>{{ $jualsampah->description }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit_jualsampah('{{ $jualsampah->id }}')" id="edit-jualsampah"><i class="fas fa-edit me-2"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_jualsampah('{{ $jualsampah->id }}')"><i class='fas fa-times'></i></button>
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

<!-- Modal Tambah Penjualan Sampah -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penjualan Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-jualsampah">
                    <div class="form-group">
                        <label for="date_input">Tanggal Penjualan</label>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal Penjualan" name="date_input" id="date_input">
                    </div>
                    <div class="form-group">
                        <label for="saldo_penjualan">Saldo</label>
                        <input type="text" class="form-control" placeholder="Masukkan saldo" name="saldo_penjualan" id="saldo_penjualan">
                    </div>
                    <div class="form-group">
                        <label for="description">Keterangan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="description" id="description">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-jualsampah">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-jualsampah">+ Tambah Penjualan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Penjualan Sampah -->
<div class="modal fade" id="ModalPenjualanSampahUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Penjualan Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-jualsampah-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="date_input_edit">Tanggal Penjualan</label>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal Penjualan" name="date_input_edit" id="date_input_edit">
                    </div>
                    <div class="form-group">
                        <label for="saldo_penjualan_edit">Saldo</label>
                        <input type="text" class="form-control" placeholder="Masukkan Saldo" name="saldo_penjualan_edit" id="saldo_penjualan_edit">
                    </div>
                    <div class="form-group">
                        <label for="description">Keterangan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="description_edit" id="description_edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-jualsampah-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-jualsampah">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Penjualan Sampah -->
<div class="modal fade" id="ModalHapusPenjualanSampah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Penjualan Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data Penjualan Sampah?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-jualsampah">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection