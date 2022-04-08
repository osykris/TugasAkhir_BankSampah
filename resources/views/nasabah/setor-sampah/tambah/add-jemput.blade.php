@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('setor-sampah') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Setor Sampah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setor-sampah') }}">Semua Setoran</a></div>
            <div class="breadcrumb-item"><a href="/add-jemput">Jemput</a></div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Jemput Sampah</h2>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Pilih Jenis Sampah Anda</label>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Klik Disini <i class="fas fa-plus ms-2"></i>
                    </button>
                </div>
            </div>
        </div> -->
        <form method="POST" action="/setor">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="metode_penyetoran">Metode Penyetoran</label>
                        <select name="metode_penyetoran" class="form-control">
                            <option selected>Jemput Sampah</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input name="tanggal" type="text" placeholder="Setiap Tanggal 20" class="form-control" disabled>
                        <p style="color: red;">Setiap tanggal 20 (sebulan sekali)</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input name="waktu" type="time" class="form-control" min="07:00" max="12:00" required>
                        <p style="color: red;">Jam operasional setiap jam 07.00-12.00 WIB</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="total_berat">Perkiraan Total Berat (Kg)</label>
                        <input type="number" class="form-control" name="total_berat" id="total_berat" placeholder="Masukkan Perkiraan">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" value="{{ Auth::user()->name }}" readonly class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                        <input name="kabupaten" type="text" value="{{ Auth::user()->kabupaten }}" readonly class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input name="kecamatan" value="{{ Auth::user()->kecamatan }}" readonly type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="desa">Desa</label>
                        <input name="desa" type="text" value="{{ Auth::user()->desa }}" readonly class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_hp">No. Telp</label>
                        <input name="no_hp" type="text" value="{{ Auth::user()->nohp }}" readonly class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="alamat_lengkap">Alamat Lengkap</label>
                        <textarea name="alamat_lengkap" readonly style="resize:none;width:1040px;height:80px;" class="form-control">{{ Auth::user()->alamat_lengkap }}</textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('setor-sampah') }}" class="btn btn-lg btn-danger">Batal</a>
                <button type="submit" class="btn btn-lg btn-primary" id="submit">Simpan</button>
            </div>
        </form>
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
                <table class="table table-striped">
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
                                <form method="post" action="#">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div </div>
        </div>
    </div>
    @endsection