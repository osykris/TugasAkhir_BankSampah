@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Artikel</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Artikel <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="artikel">Artikel</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="artikel">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Pembuat</th>
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Gambar</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($artikels as $artikel)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $artikel->name }}</td>
                                        <td>{{ $artikel->title }}</td>
                                        <td>{{ $artikel->content }}</td>
                                        <td><img src="{{ asset('frontend/images/Artikel/'.$artikel->gambar_artikel) }}" alt="" height="100"></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit_artikel('{{ $artikel->id }}')" id="edit-artikel"><i class="fas fa-edit me-2"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_artikel('{{ $artikel->id }}')"><i class='fas fa-times'></i></button>
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

<!-- Modal Tambah Artikel -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-artikel">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" placeholder="Masukkan Judul Artikel" name="title" id="title"  required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <input type="text" class="form-control" placeholder="Masukkan Isi Artikel" name="content" id="content"  required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_artikel">Gambar</label>
                        <input type="file" class="form-control" placeholder="Masukkan Gambar" name="gambar_artikel" id="gambar_artikel" accept=".jpeg,.jpg,.png"  required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-artikel">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-artikel">+ Tambah Artikel</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Artikel -->
<div class="modal fade" id="ModalArtikelUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-artikel-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="title_edit">Judul</label>
                        <input type="text" class="form-control" placeholder="Masukkan Judul Artikel" name="title_edit" id="title_edit">
                    </div>
                    <div class="form-group">
                        <label for="content_edit">Konten</label>
                        <input type="text" class="form-control" placeholder="Masukkan Isi Artikel" name="content_edit" id="content_edit">
                    </div>
                    <div class="form-group">
                        <label for="gambar_artikel_edit">Gambar</label>
                        <input type="file" class="form-control" placeholder="Masukkan Gambar" name="gambar_artikel_edit" id="gambar_artikel_edit" accept=".jpeg,.jpg,.png">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-artikel-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-artikel">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Artikel -->
<div class="modal fade" id="ModalHapusArtikel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data Artikel?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-artikel">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection