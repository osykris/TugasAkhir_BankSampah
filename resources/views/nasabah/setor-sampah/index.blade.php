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
                                        <td><div class="badge badge-info">{{ $transaksi->status }}</div></td>
                                        <td><a href="{{ url('setor-sampah/detail') }}/{{ $transaksi->id }}" class="btn btn-primary">Detail</a></td>
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
@endsection