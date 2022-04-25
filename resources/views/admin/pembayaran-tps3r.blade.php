@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pembayaran Bulanan TPS3R</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pembayaran-tps3r') }}">Pembayaran Bulanan TPS3R</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Pengguna Jasa TPS3R</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="bayar-tps3r">
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
                                    @foreach($pembayarantps3rs as $pembayarantps3r)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $pembayarantps3r->name_user }}</td>
                                        <td>{{ $pembayarantps3r->full_address }} Ds. {{ $pembayarantps3r->village }} Kec. {{ $pembayarantps3r->district }} Kab. {{ $pembayarantps3r->city }}</td>
                                        <td>{{ $pembayarantps3r->phone }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('pembayaran-tps3r-detail/detail') }}/{{ $pembayarantps3r->id }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i> Riwayat Pembayaran</a>
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