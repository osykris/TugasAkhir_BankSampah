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
                                        <td class="text-center">
                                            @if($users->saldo_user != 0)
                                            <a href="{{ url('saldo/detail') }}/{{ $users->id }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
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
@endsection