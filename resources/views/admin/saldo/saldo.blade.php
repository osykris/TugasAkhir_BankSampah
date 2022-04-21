@extends('layouts.app-dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Saldo Nasabah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('saldo') }}">Semua Saldo</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Semua Saldo</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="saldo">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Nama</th>
                                        <th>Alamat Desa</th>
                                        <th>Nomor Telepon</th>
                                        <th>Saldo</th>
                                        <th>Metode Penarikan</th>
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
                                        @if($users->saldo_user == 0)
                                        <td>
                                            <div class="badge badge-danger">Rp. {{ number_format($users->saldo_user) }}</div>
                                        </td>
                                        @else
                                        <td>
                                            <div class="badge badge-success">Rp. {{ number_format($users->saldo_user) }}</div>
                                        </td>
                                        @endif
                                        <td>{{ $users->metode_tarik_saldo }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('saldo/detail') }}/{{ $users->id }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i> Riwayat</a>
                                            @if($users->saldo_user != 0)
                                            @if($users->metode_tarik_saldo == 'Transfer Bank')
                                            <button onclick="tarik('{{ $users->id }}')" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Tarik Transfer</button>
                                            @else
                                            <button onclick="tarik_cash('{{ $users->id }}')" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Tarik Cash</button>
                                            @endif
                                            @endif
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
<!-- Modal Penarikkan Transfer -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Penarikan Saldo Transfer Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tarik">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="metode_tarik_saldo_edit">Metode Penarikan</label>
                            <input readonly type="text" class="form-control" name="metode_tarik_saldo_edit" id="metode_tarik_saldo_edit">
                        </div>
                        <div class="form-group col-6">
                            <label for="nama_pengirim">Nama Pengirim</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Pengirim" name="nama_pengirim" id="nama_pengirim">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nominal">Nominal</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input readonly type="number" class="form-control" name="saldo_user_edit" id="saldo_user_edit">
                                <div class="input-group-append">
                                    <span class="input-group-text">,00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" placeholder="Masukkan Tanggal Transfer" name="tanggal" id="tanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bank">Bank</label>
                        <input type="text" class="form-control" placeholder="Masukkan Bank Pengirim" name="bank" id="bank">
                    </div>
                    <div class="form-group">
                        <label for="bukti_pembayaran">Bukti Transfer</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input value="Upload" placeholder="Masukkan Bukti Transfer" type="file" name="bukti_pembayaran" class="form-control @error('bukti_pembayaran') is-invalid @enderror">
                                @error('bukti_pembayaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="store">Kirim</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-form">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Penarikkan Cash -->
<div class="modal fade" id="myModalCash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Penarikan Saldo Cash</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tarik-cash">
                    <input type="hidden" name="id_editt" id="id_editt">
                    <div class="form-group">
                        <label for="metode_tarik_saldo_edit">Metode Penarikan</label>
                        <input readonly type="text" class="form-control" name="metode_tarik_saldo_editt" id="metode_tarik_saldo_editt">
                    </div>
                    <div class="row">

                        <div class="form-group col-6">
                            <label for="nominal">Nominal</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input readonly type="number" class="form-control" name="saldo_user_editt" id="saldo_user_editt">
                                <div class="input-group-append">
                                    <span class="input-group-text">,00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" placeholder="Masukkan Tanggal Transfer" name="tanggal" id="tanggal">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="store-cash">Kirim</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-form-cash">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection