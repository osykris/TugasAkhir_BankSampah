@extends('layouts.app-dashboard')
@section('content')

<?php
$trigger_tps3r = 0;
?>

<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active">Profile</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
        <p class="section-lead">
            Ubah informasi tentang diri Anda di halaman ini.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-description">
                        <div class="profile-widget-name"> {{ Auth::user()->name }}
                            <div class="text-muted d-inline font-weight-normal">
                            </div>
                        </div>
                        Alamat : {{ Auth::user()->alamat_lengkap }}, {{ Auth::user()->desa }}, {{ Auth::user()->kecamatan }}, {{ Auth::user()->kabupaten }}<br />
                        No. Telp : {{ Auth::user()->nohp }}<br />
                        Email : {{ Auth::user()->email }}
                        <hr>
                        Bank : {{ Auth::user()->bank }} <br />
                        No. Rekening : {{ Auth::user()->norek }}
                    </div>
                </div>

                @foreach($usertps3rs as $usertps3r)
                @if(Auth::user()->nohp == $usertps3r->phone)
                <?php
                $trigger_tps3r = 1;
                ?>
                @endif
                @endforeach

                @if($trigger_tps3r == 1)
                <p style="color: green; font-weight:bold;">*Sudah Terdaftar Pengguna TPS3R</p>
                @else
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Daftar TPS3R
                </button>
                @endif
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form class="needs-validation" method="POST" action="{{ url('profile-nasabah') }}">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the last name
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required autocomplete="email">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>No. Telp</label>
                                    <input type="text" name="nohp" class="form-control" value="{{ Auth::user()->nohp }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Kecamatan</label>
                                    <select name="kecamatan" class="form-control " disabled>
                                        <option>Kanigoro</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Kabupaten</label>
                                    <select name="kabupaten" class="form-control " disabled>
                                        <option>Blitar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Desa</label>
                                    <select class="form-control selectric" name="desa" value="{{ Auth::user()->desa }}" required>
                                        <option value="Pilih Desa" disabled selected>Pilih Desa</option>
                                        <option value="Bangle" {{ (Auth::user()->desa == 'Bangle' ? 'selected' : '')}}>Bangle</option>
                                        <option value="Gaprang" {{ (Auth::user()->desa == 'Gaprang' ? 'selected' : '')}}>Gaprang</option>
                                        <option value="Gogodeso" {{ (Auth::user()->desa == 'Gogodeso' ? 'selected' : '')}}>Gogodeso</option>
                                        <option value="Jatinom" {{ (Auth::user()->desa == 'Jatinom' ? 'selected' : '')}}>Jatinom</option>
                                        <option value="Karangsono" {{ (Auth::user()->desa == 'Karangsono' ? 'selected' : '')}}>Karangsono</option>
                                        <option value="Kuningan" {{ (Auth::user()->desa == 'Kuningan' ? 'selected' : '')}}>Kuningan</option>
                                        <option value="Minggirsari" {{ (Auth::user()->desa == 'Minggirsari' ? 'selected' : '')}}>Minggirsari</option>
                                        <option value="Papungan" {{ (Auth::user()->desa == 'Papungan' ? 'selected' : '')}}>Papungan</option>
                                        <option value="Satreyan" {{ (Auth::user()->desa == 'Satreyan' ? 'selected' : '')}}>Satreyan</option>
                                        <option value="Sawentar" {{ (Auth::user()->desa == 'Sawentar' ? 'selected' : '')}}>Sawentar</option>
                                        <option value="Tlogo" {{ (Auth::user()->desa == 'Tlogo' ? 'selected' : '')}}>Tlogo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating col-md-12 col-12">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap" required class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px">{{ Auth::user()->alamat_lengkap }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Bank</label>
                                    <input type="text" name="bank" class="form-control" value="{{ Auth::user()->bank }}" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Nomor Rekening</label>
                                    <input type="text" name="norek" class="form-control" value="{{ Auth::user()->norek }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-12">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Daftar TPS3R -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar TPS3R</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-userdaftartps3r">
                    <div class="form-group">
                        <label for="name_user">Nama Pengguna</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}" name="name_user" id="name_user" readonly>
                    </div>
                    <div class="form-group">
                        <label for="full_address">Alamat Lengkap</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->alamat_lengkap }}" placeholder="{{ Auth::user()->alamat_lengkap }}" name="full_address" id="full_address" readonly>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="village">Desa</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->desa }}" placeholder="{{ Auth::user()->desa }}" name="village" id="village" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="district">Kecamatan</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->kecamatan }}" placeholder="{{ Auth::user()->kecamatan }}" name="district" id="district" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="city">Kabupaten</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->kabupaten }}" placeholder="{{ Auth::user()->kabupaten }}" name="city" id="city" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="phone">Nomor Telepon</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->nohp }}" placeholder="{{ Auth::user()->nohp }}" name="phone" id="phone" readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-userdaftartps3r">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-userdaftartps3r">Daftar</button>
            </div>
        </div>
    </div>
</div>

@endsection