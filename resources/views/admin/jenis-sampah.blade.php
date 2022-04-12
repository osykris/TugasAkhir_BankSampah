@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data Jenis Sampah</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Jenis Sampah <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="jenis-sampah">Data Jenis Sampah</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama Jenis Sampah</th>
                                        <th>Harga</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($sampahs as $sampah)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $sampah->nama_jenisSampah }}</td>
                                        <td>Rp. {{ number_format($sampah->harga) }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit('{{ $sampah->id }}')" id="edit-sampah"><i class="fas fa-edit me-2"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_sampah('{{ $sampah->id }}')"><i class='fas fa-times'></i></button>
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

<!-- Modal Tambah Jenis Sampah -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-sampah">
                    <div class="form-group">
                        <label for="nama_jenisSampah">Nama Jenis Sampah</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Jenis Sampah" name="nama_jenisSampah" id="nama_jenisSampah">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" placeholder="Masukkan Harga" name="harga" id="harga">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-sampah">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-sampah">+ Tambah Sampah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Jenis Sampah -->
<div class="modal fade" id="ModalSampahUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jenis Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-sampah-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="nama_jenisSampah_edit">Nama Jenis Sampah</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Jenis Sampah" name="nama_jenisSampah_edit" id="nama_jenisSampah_edit">
                    </div>
                    <div class="form-group">
                        <label for="harga_edit">Harga</label>
                        <input type="text" class="form-control" placeholder="Masukkan Harga" name="harga_edit" id="harga_edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-sampah-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-sampah">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Jenis Sampah -->
<div class="modal fade" id="ModalHapusSampah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Jenis Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus jenis sampah?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-sampah">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection