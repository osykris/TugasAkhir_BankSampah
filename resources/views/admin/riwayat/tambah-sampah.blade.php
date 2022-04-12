@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah Jenis Sampah</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Jenis Sampah <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tambah Sampah</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @if(empty($detail_transaksis->id))
                <h6 style="color: red;">Silahkan untuk menambahkan jenis sampah beserta beratnya.</h6>
                @endif

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
                                <form method="POST" action="{{ url('tambah-sampah') }}/{{ $sampah->id }}">
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
</div>
@endsection