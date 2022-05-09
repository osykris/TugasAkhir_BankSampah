@extends('layouts.app-dashboard')

@section('content')

@section('style')
<style>
    .wrap-white {
        padding: 1.5rem;
        background-color: #fff;
        border-radius: 5px;
    }
</style>
@endsection

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('setor-sampah') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Setor Sampah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setor-sampah') }}">Semua Setoran</a></div>
            <div class="breadcrumb-item"><a href="/add-setor">Setor</a></div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Setor Sampah</h2>
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
        <!-- <div class="wrap-white rounded">
            <div class="row">
                @if (count($sampah_selected) != 0)
                @foreach ($sampah_selected as $sampah_selecteds)
                <div class="col-md-4">
                    <div class="card" style="background: white; border-radius: 5px;">
                        <div class="row" style="margin-top: 15px; margin-left: 10px; ">
                            <div class="col-md-8">
                                <p style="font-size: 14px;"> {{ $sampah_selecteds->jenis_sampah }} - Rp. {{ number_format($sampah_selecteds->harga) }} / kg</p>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ url('sampah/hapus') }}/{{ $sampah_selecteds->id }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-transparant" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');"><i style="color: red;" class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div> -->
        <form method="POST" action="/setor">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="metode_penyetoran">Metode Penyetoran</label>
                        <select name="metode_penyetoran" class="form-control">
                            <option selected>Setor Sampah</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input name="tanggal" type="date" class="form-control">
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
                        <input type="text" class="form-control" name="total_berat" id="total_berat" placeholder="Masukkan Perkiraan">
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
@endsection