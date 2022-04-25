@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Pengguna Jasa TPS3R</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Pengguna <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="pengguna-tps3r">Pengguna Jasa TPS3R</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="pengguna_tps3r">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($usertps3rs as $usertps3r)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $usertps3r->name_user }}</td>
                                        <td>{{ $usertps3r->full_address }} Ds. {{ $usertps3r->village }} Kec. {{ $usertps3r->district }} Kab. {{ $usertps3r->city }}</td>
                                        <td>{{ $usertps3r->phone }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit_usertps3r('{{ $usertps3r->id }}')" id="edit-usertps3r"><i class="fas fa-edit me-2"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_usertps3r('{{ $usertps3r->id }}')"><i class='fas fa-times'></i></button>
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

<!-- Modal Tambah Pengguna TPS3R -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengguna TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-usertps3r">
                    <div class="form-group">
                        <label for="name_user">Nama Pengguna</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="name_user" id="name_user">
                    </div>
                    <div class="form-group">
                        <label for="full_address">Alamat Lengkap</label>
                        <input type="text" class="form-control" placeholder="Masukkan Alamat Lengkap" name="full_address" id="full_address">
                    </div>
                    <div class="form-group">
                      <label>Desa</label>
                      <select class="form-control selectric" name="village" id="village">
                      <option value="Pilih Desa" disabled selected>Pilih Desa</option>
                        <option value="Bangle">Bangle</option>
                        <option value="Gaprang">Gaprang</option>
                        <option value="Gogodeso">Gogodeso</option>
                        <option value="Jatinom">Jatinom</option>
                        <option value="Karangsono">Karangsono</option>
                        <option value="Kuningan">Kuningan</option>
                        <option value="Minggirsari">Minggirsari</option>
                        <option value="Papungan">Papungan</option>
                        <option value="Satreyan">Satreyan</option>
                        <option value="Sawentar">Sawentar</option>
                        <option value="Tlogo">Tlogo</option>
                      </select>
                    </div>
                    <input type="hidden" class="form-control" value="Kanigoro" placeholder="Masukkan Kecamatan" name="district" id="district">
                    <input type="hidden" class="form-control" value="Blitar" placeholder="Masukkan Kabupaten" name="city" id="city">
                    <div class="form-group">
                        <label for="phone">No. Telp</label>
                        <input type="text" class="form-control" placeholder="Masukkan No. Telp" name="phone" id="phone">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-usertps3r">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-usertps3r">+ Tambah Pengguna</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Pengguna TPS3R -->
<div class="modal fade" id="ModalPenggunaTPS3RUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pengguna TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-usertps3r-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="name_user_edit">Nama Pengguna</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="name_user_edit" id="name_user_edit">
                    </div>
                    <div class="form-group">
                        <label for="full_address_edit">Alamat (Jl/Dusun RT RW)</label>
                        <input type="text" class="form-control" placeholder="Masukkan Alamat" name="full_address_edit" id="full_address_edit">
                    </div>
                    <div class="form-group">
                      <label>Desa</label>
                      <select class="form-control selectric" name="village_edit" id="village_edit">
                      <option value="Pilih Desa" disabled selected>Pilih Desa</option>
                        <option value="Bangle">Bangle</option>
                        <option value="Gaprang">Gaprang</option>
                        <option value="Gogodeso">Gogodeso</option>
                        <option value="Jatinom">Jatinom</option>
                        <option value="Karangsono">Karangsono</option>
                        <option value="Kuningan">Kuningan</option>
                        <option value="Minggirsari">Minggirsari</option>
                        <option value="Papungan">Papungan</option>
                        <option value="Satreyan">Satreyan</option>
                        <option value="Sawentar">Sawentar</option>
                        <option value="Tlogo">Tlogo</option>
                      </select>
                    </div>
                    <input type="hidden" class="form-control" value="Kanigoro" placeholder="Masukkan Kecamatan" name="district_edit" id="district_edit">
                    <input type="hidden" class="form-control" value="Blitar" placeholder="Masukkan Kabupaten" name="city_edit" id="city_edit">
                    <div class="form-group">
                        <label for="phone_edit">No. Telp</label>
                        <input type="text" class="form-control" placeholder="Masukkan No. Telp" name="phone_edit" id="phone_edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-usertps3r-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-usertps3r">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Saldo TPS3R -->
<div class="modal fade" id="ModalHapusPenggunaTPS3R" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Pengguna TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data Pengguna Jasa TPS3R?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-usertps3r">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection