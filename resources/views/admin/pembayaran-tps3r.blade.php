@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pembayaran Bulanan TPS3R</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Pembayaran Bulanan <i class="fas fa-plus"></i>
            </button>
        </div>
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

<!-- Modal Tambah Pembayaran Bulanan TPS3R -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembayaran Bulanan TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-paytps3r">
                    <div class="form-group">
                      <label>Pengguna Jasa</label>
                      <select class="form-control selectric" name="id_user_tps3r" id="id_user_tps3r">
                      <option value="Pilih Pengguna" disabled selected>Pilih Pengguna</option>
                        @foreach($pembayarantps3rs as $pembayarantps3r)
                            <option value="{{ $pembayarantps3r->id }}">{{ $pembayarantps3r->name_user }}</option>
                        @endforeach
                      </select>
                    </div>
                    <?php
                        $getMonth = date("n");
                        if ( $getMonth == 1 ) {
                            $getMonth = "Januari";
                        } else if ( $getMonth == 2 ) {
                            $getMonth = "Februari";
                        } else if ( $getMonth == 3 ) {
                            $getMonth = "Maret";
                        } else if ( $getMonth == 4 ) {
                            $getMonth = "April";
                        } else if ( $getMonth == 5 ) {
                            $getMonth = "Mei";
                        } else if ( $getMonth == 6 ) {
                            $getMonth = "Juni";
                        } else if ( $getMonth == 7 ) {
                            $getMonth = "Juli";
                        } else if ( $getMonth == 8 ) {
                            $getMonth = "Agustus";
                        } else if ( $getMonth == 9 ) {
                            $getMonth = "September";
                        } else if ( $getMonth == 10 ) {
                            $getMonth = "Oktober";
                        } else if ( $getMonth == 11) {
                            $getMonth = "November";
                        } else if ( $getMonth == 12 ) {
                            $getMonth = "Desember";
                        }
                        $getYear = date("Y");
                        $getDate = date("Y-m-d");;
                        $getSaldo = 20000;
                        $getDesc = "Dari pengguna jasa (1 x 20000)";
                    ?>
                    <input type="hidden" class="form-control" value="{{ $getMonth }}" placeholder="Masukkan Bulan" name="month" id="month">
                    <input type="hidden" class="form-control" value="{{ $getYear }}" placeholder="Masukkan Tahun" name="year" id="year">
                    <input type="hidden" class="form-control" value="{{ $getDate }}" placeholder="Masukkan Tanggal" name="tanggal_input" id="tanggal_input">
                    <input type="hidden" class="form-control" value="{{ $getSaldo }}" placeholder="Masukkan Saldo" name="saldo_tps3r" id="saldo_tps3r">
                    <input type="hidden" class="form-control" value="{{ $getDesc }}" placeholder="Masukkan Keterangan" name="keterangan" id="keterangan">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-payment-tps3r">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-payment-tps3r">+ Tambah Pembayaran</button>
            </div>
        </div>
    </div>
</div>

@endsection