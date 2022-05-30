@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Saldo Masuk TPS3R</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Saldo <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="saldo-tps3r">Saldo Masuk TPS3R</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php $sisa_saldo = 0; ?>
                        @foreach($tps3rs as $tps3r)
                        <?php $sisa_saldo += $tps3r->saldo_tps3r; ?>
                        @endforeach
                        <?php $sisa_saldo -= $sum_tps3r_keluar; ?>
                        <h4 style="color: #34395E;">Saldo: Rp. {{ number_format($sisa_saldo) }}</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" id="tpsr">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Tanggal Input</th>
                                        <th>Keterangan</th>
                                        <th>Saldo</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($tps3rs as $tps3r)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $tps3r->tanggal_input }}</td>
                                        <td>{{ $tps3r->keterangan }}</td>
                                        <td>Rp. {{ number_format($tps3r->saldo_tps3r) }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit_tps3r('{{ $tps3r->id }}')" id="edit-tps3r"><i class="fas fa-edit me-2"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_tps3r('{{ $tps3r->id }}')"><i class='fas fa-times'></i></button>
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

<!-- Modal Tambah Saldo TPS3R -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Saldo TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tps3r">
                    <div class="form-group">
                        <label for="tanggal_input">Tanggal Input</label>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal" name="tanggal_input" id="tanggal_input"  required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan" id="keterangan"  required>
                    </div>
                    <div class="form-group">
                        <label for="saldo_tps3r">Saldo</label>
                        <input type="text" class="form-control" placeholder="Masukkan saldo" name="saldo_tps3r" id="saldo_tps3r"  required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-tps3r">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-tps3r">+ Tambah Saldo</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Saldo TPS3R -->
<div class="modal fade" id="ModalSaldoTPS3RUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Saldo TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tps3r-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="tanggal_input_edit">Tanggal Input</label>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal Input" name="tanggal_input_edit" id="tanggal_input_edit">
                    </div>
                    <div class="form-group">
                        <label for="keterangan_edit">Keterangan</label>
                        <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan_edit" id="keterangan_edit">
                    </div>
                    <div class="form-group">
                        <label for="saldo_tps3r_edit">Saldo</label>
                        <input type="text" class="form-control" placeholder="Masukkan Saldo" name="saldo_tps3r_edit" id="saldo_tps3r_edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-tps3r-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-tps3r">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Saldo TPS3R -->
<div class="modal fade" id="ModalHapusSaldoTPS3R" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Saldo TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data Saldo TPS3R?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-tps3r">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection