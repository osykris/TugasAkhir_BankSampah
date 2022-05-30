<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="icon" href="{{ url('frontend/images/throwing-trash.png') }}">
  <title>SEMANDING</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" style="outline: none;">x</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  @if ($message = Session::get('error'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" style="outline: none;">x</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <a href="/">
              <img src="../assets/img/throwing-trash.png" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            </a>
            <h4 class="font-weight-normal" style="color: #071C4D;">Selamat Datang Di <span class="font-weight-bold">Semanding Web</span></h4>
            <p class="text-muted">Sebelum memulai, Anda harus login atau mendaftar jika Anda belum memiliki akun.</p>
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="invalid-feedback">
                  Silahkan isi email Anda
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="invalid-feedback">
                  Silahkan isi password Anda
                </div>
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" tabindex="3" id="remember-me" name="remember-me" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
              </div>

              <div class="form-group text-right">
                @if (Route::has('password.request'))
                <a class="float-left mt-3" href="{{ route('password.request') }}">
                  {{ __('Lupa Password?') }}
                </a>
                @endif
                <button type="submit" style="background-color:#FF9E53; color:white;" class="btn btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                Tidak punya akun? <a href="{{ route('register') }}">Buat akun baru</a>
              </div>
            </form>

            <div class="mt-5 form-group text-right">
              <button style="background-color:#FF9E53; color:white;" class="btn btn-lg btn-icon icon-right" data-toggle="modal" data-target="#myModal">
                Daftar Pengguna TPS3R
              </button>
            </div>

            <div class="text-center mt-5 text-small">
              2022 Copyright Semanding • Seluruh Hak Cipta • Dibuat oleh 💙 Mahasiswa Politeknik Negeri Malang
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/bg5.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Selamat Datang</h1>
                <h5 class="font-weight-normal text-muted-transparent">Kanigoro, Kab. Blitar</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal Daftar Pengguna TPS3R -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Daftar Pengguna TPS3R</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/add-daftartps3r/save" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name_user">Nama Pengguna</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama" name="name_user" id="name_user" required>
            </div>
            <div class="form-group">
              <label for="full_address">Alamat Lengkap</label>
              <input type="text" class="form-control" placeholder="Masukkan Alamat Lengkap" name="full_address" id="full_address"  required>
            </div>
            <div class="form-group">
              <label>Desa</label>
              <select class="form-control selectric" name="village" id="village">
                <option value="Pilih Desa" disabled selected>Pilih Desa</option>
                <option value="Bangle">Bangle</option>
                <option value="Gaprang">Gaprang</option>
                <option value="Gogodeso">Gogodeso</option>
                <option value="Jatinom">Jatinom</option>
                <option value="Karangsono">Karangsono</option>
                <option value="Kuningan">Kuningan</option>
                <option value="Minggirsari">Minggirsari</option>
                <option value="Papungan">Papungan</option>
                <option value="Satreyan">Satreyan</option>
                <option value="Sawentar">Sawentar</option>
                <option value="Tlogo">Tlogo</option>
              </select>
            </div>
            <input type="hidden" class="form-control" value="Kanigoro" placeholder="Masukkan Kecamatan" name="district" id="district">
            <input type="hidden" class="form-control" value="Blitar" placeholder="Masukkan Kabupaten" name="city" id="city">
            <div class="form-group">
              <label for="phone">No. Telp</label>
              <input type="text" class="form-control" placeholder="Masukkan No. Telp" name="phone" id="phone"  required>
            </div>
            <!-- <input type="submit" value="Simpan Data"> -->
            <button type="submit" style="background-color:#FF9E53; color:white;" class="btn btn-icon">Daftar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>

</html>