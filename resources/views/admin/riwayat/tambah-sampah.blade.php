@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
         <div class="section-header-back">
            <a href="{{ route('riwayat-transaksiNasabah') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Jenis Sampah</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Jenis Sampah <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('riwayat-transaksiNasabah') }}">Riwayat</a></div>
            <div class="breadcrumb-item active"><a href="#">Tambah Sampah</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @foreach($namas as $nama)
                <h6>Nama Nasabah : {{ $nama->name }}</h6><br/>
                @endforeach
                <table class="table table-striped" id="detail-sampah">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Jenis Sampah</th>
                            <th>Harga</th>
                            <th>Berat</th>
                            <th>Total Harga</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($detail_transaksis as $detail_transaksi)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $detail_transaksi->jenis_sampah }}</td>
                            <td>Rp {{ number_format($detail_transaksi->harga) }}</td>
                            <td>{{ $detail_transaksi->berat }} kg</td>
                            <td>Rp {{ number_format($detail_transaksi->total_harga) }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_sampahtambah('{{ $detail_transaksi->id }}')"><i class='fas fa-times'></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <form method="POST" action="{{ url('transaksi/selesai') }}/{{ $id }}/{{ $iduser }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <option selected>Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="cool-3">
                            <button type="submit" style="float: right;" class="btn btn-success">Konfirmasi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Modal Tambah Jenis Sampah -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped" id="tambah-sampah">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
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
                            <td>Rp {{ number_format($sampah->harga) }}</td>
                            <td class="text-center">
                                <form method="POST" action="{{ url('tambah-sampah/save') }}/{{ $sampah->id }}/{{ $iduser }}">
                                    @csrf
                                    <input type="text" class="form-control" name="total_berat" required="" id="total_berat" placeholder="Masukkan Berat (kg)">
                                    <button type="submit" style="float: left;" class="btn btn-primary">Tambah</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div </div>
        </div>
    </div>
</div>
<!-- Modal Hapus Jenis Sampah -->
<div class="modal fade" id="ModalHapusTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-danger" id="btn-hapus-sampahtambah">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection