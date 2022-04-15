@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Produk Daur Ulang</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Produk <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="produk-daur-ulang">Produk Daur Ulang</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="product">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Pembuat</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Gambar</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->nama }}</td>
                                        <td>{{ $product->deskripsi }}</td>
                                        <td>Rp. {{ number_format($product->harga) }}</td>
                                        <!-- <td>{{ $product->gambar }}</td> -->
                                        <td><img src="{{ asset('frontend/images/Produk/'.$product->gambar) }}" alt="" height="100"></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit_product('{{ $product->id }}')" id="edit-product"><i class="fas fa-edit me-2"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_product('{{ $product->id }}')"><i class='fas fa-times'></i></button>
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

<!-- Modal Tambah Produk Daur Ulang -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-product">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Produk" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Deskripsi Produk" name="deskripsi" id="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" placeholder="Masukkan Harga" name="harga" id="harga">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" placeholder="Masukkan Gambar" name="gambar" id="gambar" accept=".jpeg,.jpg,.png">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-product">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-product">+ Tambah Produk</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Produk Daur Ulang -->
<div class="modal fade" id="ModalProdukDaurUlangUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Produk Daur Ulang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-product-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="nama_edit">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Produk" name="nama_edit" id="nama_edit">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_edit">Deskripsi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Deskripsi Produk" name="deskripsi_edit" id="deskripsi_edit">
                    </div>
                    <div class="form-group">
                        <label for="harga_edit">Harga</label>
                        <input type="text" class="form-control" placeholder="Masukkan Harga" name="harga_edit" id="harga_edit">
                    </div>
                    <div class="form-group">
                        <label for="gambar_edit">Gambar</label>
                        <input type="file" class="form-control" placeholder="Masukkan Gambar" name="gambar_edit" id="gambar_edit" accept=".jpeg,.jpg,.png">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-product-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-product">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Produk Daur Ulang -->
<div class="modal fade" id="ModalHapusProdukDaurUlang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Produk Daur Ulang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data Produk?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-product">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection