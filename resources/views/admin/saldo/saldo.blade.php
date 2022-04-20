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
                                            @if($users->saldo_user != 0)
                                            <a href="{{ url('saldo/detail') }}/{{ $users->id }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                                            <button data-toggle="modal" data-target="#myModal" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Tarik Saldo</button>
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
<!-- Modal Pengajuan Penarikkan -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajukan Metode Penarikan Saldo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/metode-penarikan-saldo') }}/{{ Auth::user()->id }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="status_edit">Metode Penarikan Saldo</label>
                        <select class="form-control" name="metode_tarik_saldo" id="metode_tarik_saldo" required>
                            <option value="" selected disabled>Pilih Metode Penarikan</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="update-status-data">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection