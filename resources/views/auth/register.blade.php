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
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <style>
    body {
      background-image: url("../assets/img/bag3.jpg");
      background-repeat: no-repeat;
      background-size: cover
    }
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <a href="/">
                <img src="../assets/img/throwing-trash-white.png" alt="logo" width="100" class="shadow-light rounded-circle">
              </a>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4 style="color: #071C4D;">Registrasi</h4>
              </div>

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="name">Nama Lengkap</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-6">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <div class="invalid-feedback">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-6">
                      <label for="password-confirm" class="d-block">Konfirmasi Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>

                  <div class="form-divider">
                    Alamat Rumah
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
                    <div class="form-group col-6">
                      <label>No. HP</label>
                      <input type="text" name="nohp" class="form-control">
                    </div>
                    <div class="form-group col-6">
                      <label>Desa</label>
                      <select class="form-control selectric" name="desa">
                      <option value="Pilih Desa">Pilih Desa</option>
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
                  </div>
                  <div class="form-floating">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat_lengkap" class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px"></textarea>
                  </div><br>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">Saya setuju dengan syarat dan ketentuan</label>
                    </div>
                    <div class="mt-5 text-center">
                      Sudah punya akun? <a href="{{ route('login') }}">Login disini</a>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" style="background-color:#FF9E53; color:white;" class="btn  btn-lg btn-block">
                      Daftar Disini
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Semanding 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/auth-register.js"></script>
</body>

</html>