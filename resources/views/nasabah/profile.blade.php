@extends('layouts.app-dashboard')
@section('content')
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
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form  class="needs-validation" method="POST" action="{{ url('profile-nasabah') }}">
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
@endsection