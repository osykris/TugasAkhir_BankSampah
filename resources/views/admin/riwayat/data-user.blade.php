@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Riwayat Transaksi Nasabah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('riwayat-transaksiNasabah') }}">Semua Riwayat Nasabah</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Riwayat Nasabah</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="penarikan-nasabah">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama</th>
                                        <th>Alamat Desa</th>
                                        <th>Nomor Telepon</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($user as $users)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->desa }}</td>
                                        <td>{{ $users->nohp }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('riwayat-transaksiNasabah/detail') }}/{{ $users->id }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i> Riwayat Transaksi</a>
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

@endsection