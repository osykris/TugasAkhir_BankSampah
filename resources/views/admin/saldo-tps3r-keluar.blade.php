@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Saldo Keluar TPS3R</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Pengeluaran <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="saldo-tps3r-keluar">Saldo Keluar TPS3R</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php 
                            $sisa_saldo = 0; 
                            $sisa_saldo = $sum_tps3r_masuk;
                        ?>
                        @foreach($tps3r_keluars as $tps3r_keluar)
                        <?php $sisa_saldo -= $tps3r_keluar->saldo_tps3r_keluar; ?>
                        @endforeach
                        <h4 style="color: #34395E;">Saldo: Rp. {{ number_format($sisa_saldo) }}</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" id="tpsr_keluar">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Tanggal Pengeluaran</th>
                                        <th>Keterangan</th>
                                        <th>Saldo Keluar</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($tps3r_keluars as $tps3r_keluar)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $tps3r_keluar->tgl_masuk }}</td>
                                        <td>{{ $tps3r_keluar->ket }}</td>
                                        <td>Rp. {{ number_format($tps3r_keluar->saldo_tps3r_keluar) }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit_tps3r_keluar('{{ $tps3r_keluar->id }}')" id="edit-tps3r_keluar"><i class="fas fa-edit me-2"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_tps3r_keluar('{{ $tps3r_keluar->id }}')"><i class='fas fa-times'></i></button>
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

<!-- Modal Tambah Pengeluaran TPS3R -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengeluaran TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tps3r_keluar">
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Pengeluaran</label>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal" name="tgl_masuk" id="tgl_masuk">
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="ket" id="ket">
                    </div>
                    <div class="form-group">
                        <label for="saldo_tps3r_keluar">Saldo Keluar</label>
                        <input type="text" class="form-control" placeholder="Masukkan Pengeluaran" name="saldo_tps3r_keluar" id="saldo_tps3r_keluar">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-tps3r_keluar">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-tps3r_keluar">+ Tambah Pengeluaran</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Pengeluaran TPS3R -->
<div class="modal fade" id="ModalPengeluaranTPS3RUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pengeluaran TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tps3r_keluar-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="tgl_masuk_edit">Tanggal Pengeluaran</label>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal" name="tgl_masuk_edit" id="tgl_masuk_edit">
                    </div>
                    <div class="form-group">
                        <label for="ket_edit">Keterangan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="ket_edit" id="ket_edit">
                    </div>
                    <div class="form-group">
                        <label for="saldo_tps3r_keluar_edit">Saldo Keluar</label>
                        <input type="text" class="form-control" placeholder="Masukkan Saldo" name="saldo_tps3r_keluar_edit" id="saldo_tps3r_keluar_edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-tps3r_keluar-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-tps3r_keluar">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Pengeluaran TPS3R -->
<div class="modal fade" id="ModalHapusPengeluaranTPS3R" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Pengeluaran TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data Pengeluaran TPS3R?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-tps3r_keluar">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection