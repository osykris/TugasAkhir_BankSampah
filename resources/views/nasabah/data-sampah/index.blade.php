@extends('layouts.app-dashboard')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Data Harga Sampah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="data-sampah">Data Harga Sampah</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama Jenis Sampah</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($sampahs as $sampah)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $sampah->nama_jenisSampah }}</td>
                                        <td>Rp. {{ number_format($sampah->harga) }}</td>
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