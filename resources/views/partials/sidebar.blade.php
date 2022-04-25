<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <br>
    <div class="sidebar-brand">
      <a class="text-light" href="{{ route('dashboard') }}"><img src="../frontend/images/throwing-trash-fill.png" height="80" alt=""><span>SEMANDING</span></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}"><img src="{!! asset('frontend/images/throwing-trash.png') !!}" height="60" alt=""></a>
    </div><br><br><br><br>
    <ul class="sidebar-menu">
      @if (Auth::user()->hasRole('admin'))
      <li class="menu-header" >Dashboard</li>
      <li class="nav-item {{ Request::is('*dashboard*') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Beranda</span></a>
      </li>
      <li class="menu-header">Bank Sampah</li>
      <li class="nav-item {{ Request::is('*user*') ? 'active' : '' }}">
        <a href="{{ route('user') }}" class="nav-link"><i class="fas fa-users"></i> <span>Nasabah</span></a>
      </li>
      <li class="nav-item dropdown {{ Request::is('*transaksi-masuk*') ? 'active' : Request::is('*riwayat-transaksiNasabah*') ? 'active' : '' }}">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-calculator"></i> <span>Transaksi</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::is('*transaksi-masuk*') ? 'active' : '' }}">
            <a href="{{ route('transaksi-masuk') }}" class="nav-link ">Transaksi Masuk</a>
          </li>
          <li class="{{ Request::is('*riwayat-transaksiNasabah*') ? 'active' : '' }}">
            <a href="{{ route('riwayat-transaksiNasabah') }}" class="nav-link ">Riwayat Transaksi</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown {{ Request::is('*saldo*') ? 'active' : Request::is('*penarikan-nasabah*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-check-alt"></i> <span>Saldo</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::is('*saldo*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('saldo') }}">Saldo</a></li>
          <li class="{{ Request::is('*penarikan-nasabah*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('penarikan-nasabah') }}">Riwayat Penarikan</a></li>
        </ul>
      </li>
      <li class="nav-item {{ Request::is('*penjualan-sampah*') ? 'active' : '' }}">
        <a href="{{ route('penjualan-sampah') }}" class="nav-link"><i class="fas fa-chart-line"></i> <span>Penjualan</span></a>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fa fa-book"></i> <span>Laporan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="forms-advanced-form.html">Laporan Transaksi</a></li>
          <li><a class="nav-link" href="forms-editor.html">Laporan Penjualan</a></li>
        </ul>
      </li>

      <li class="nav-item {{ Request::is('*jenis-sampah*') ? 'active' : '' }}">
        <a href="{{ route('jenis-sampah') }}" class="nav-link"><i class="fa fa-trash"></i> <span>Jenis Sampah</span></a>
      </li>
      <li class="nav-item dropdown {{ Request::is('*produk-daur-ulang*') ? 'active' : Request::is('*artikel*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fa fa-plus-square"></i> <span>Lain-Lain</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::is('*produk-daur-ulang*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('produk-daur-ulang') }}">Produk</a></li>
          <li class="{{ Request::is('*artikel*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('artikel') }}">Artikel</a></li>
        </ul>
      </li>

      <li class="menu-header">TPS3R</li>
      <li class="nav-item dropdown {{  Request::is('*tps3r-masuk*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check-alt"></i> <span>Saldo</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::is('*tps3r-masuk*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tps3r-masuk') }}">Saldo Masuk</a></li>
          <li><a class="nav-link" href="#">Saldo Keluar</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown {{ Request::is('*pengguna-tps3r*') ? 'active' : Request::is('*pembayaran-tps3r*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fa fa-plus-square"></i> <span>Pengguna Jasa</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::is('*pengguna-tps3r*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pengguna-tps3r') }}">Tambah Pengguna</a></li>
          <li class="{{ Request::is('*pembayaran-tps3r*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pembayaran-tps3r') }}">Pembayaran Bulanan</a></li>
        </ul>
      </li>
      @endif
      @if (Auth::user()->hasRole('user'))
      <li class="nav-item {{ Request::is('*dashboard*') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="nav-link "><i class="fas fa-fire"></i> <span> Beranda</span></a>
      </li>
      <li class="menu-header">Sampah</li>
      <li class="nav-item {{ Request::is('*data-sampah*') ? 'active' : '' }}">
        <a href="{{ route('data-sampah')}}" class="nav-link "><i class="fa fa-trash"></i> <span> Daftar Harga Sampah</span></a>
      </li>
      <li class="menu-header">Transaksi</li>
      <li class="nav-item {{ Request::is('*setor-sampah*') ? 'active' : '' }}">
        <a href="{{ route('setor-sampah') }}" class="nav-link "><i class="fas fa-hands-helping"></i> <span> Setor Sampah</span></a>
      </li>
      <li class="nav-item {{ Request::is('*riwayat-transaksi*') ? 'active' : '' }}">
        <a href="{{ route('riwayat-transaksi') }}" class="nav-link "><i class="fas fa-calculator"></i> <span> Riwayat Transaksi</span></a>
      </li>

      <li class="nav-item dropdown {{ Request::is('*saldo-nasabah*') ? 'active' : Request::is('*penarikan-riwayat*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check-alt"></i> <span>Saldo</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::is('*saldo-nasabah*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('saldo-nasabah') }}">Saldo</a></li>
          <li class="{{ Request::is('*penarikan-riwayat*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('penarikan-riwayat') }}">Riwayat Penarikan</a></li>
        </ul>
      </li>
      <li class="nav-item ">
        <a href="{{ route('setor-sampah') }}" class="nav-link "><i class="fa fa-book"></i> <span> Laporan</span></a>
      </li>
      @endif
    </ul>
  </aside>
</div>