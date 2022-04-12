@extends('layouts.app-dashboard')
@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Setor Sampah</h1>
        <div class="section-header-button">
            <a class="nav-link dropdown-toggle btn btn-primary" href="#" id="navbardrop" data-toggle="dropdown">
                Tambah Setoran
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/add-setor">Setor Sampah</a>
                <a class="dropdown-item" href="/add-jemput">Jemput Sampah</a>
            </div>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Semua Setoran</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Semua Setoran</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="setor-transaksi">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($transaksis as $transaksi)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ Auth::user()->name }}</td>
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
                                        <td>
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit_setor('{{ $transaksi->id }}')" id="edit-setor"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_setor('{{ $transaksi->id }}')"><i class='fas fa-times'></i></button>
                                            <a href="{{ url('setor-sampah/detail') }}/{{ $transaksi->id }}" class="btn btn-outline-primary">Detail</a>
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

<!-- Modal Update Setoran -->
<div class="modal fade" id="ModalSetorUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Transaksi Setor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-setor-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="metode_penyetoran_edit">Metode Penyetoran</label>
                        <select name="metode_penyetoran_edit" class="form-control" id="metode_penyetoran_edit">
                            <option value="" selected disabled>Pilih Metode Penyetoran</option>
                            <option value="Setor Sampah">Setor Sampah</option>
                            <option value="Jemput Sampah">Jemput Sampah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_edit">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal_edit" id="tanggal_edit">

                    </div>
                    <div class="form-group">
                        <label for="waktu_edit">Waktu</label>
                        <input type="time" name="waktu_edit" id="waktu_edit" class="form-control" min="07:00" max="12:00" required>
                        <p style="color: red;">Jam operasional setiap jam 07.00-12.00 WIB</p>
                    </div>
                    <div class="form-group">
                        <label for="total_berat_edit">Perkiraan Total Berat</label>
                        <input type="number" class="form-control" placeholder="Masukkan Perkiraan Total Berat" name="total_berat_edit" id="total_berat_edit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-setor-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-setor">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Jenis Sampah -->
<div class="modal fade" id="ModalHapusSetor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Transaksi Setor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus transaksi setoran?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-setor">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection