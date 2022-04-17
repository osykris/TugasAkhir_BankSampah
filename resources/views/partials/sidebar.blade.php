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
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="index-0.html">Artikel Dashboard</a></li>
          <li><a class="nav-link" href="index.html">Produk Dashboard</a></li>
        </ul>
      </li>
      <li class="menu-header">Bank Sampah</li>
      <li class="nav-item">
        <a href="{{ route('user') }}" class="nav-link"><i class="fas fa-users"></i> <span>Nasabah</span></a>
      </li>
      <li class="nav-item ">
        <a href="{{ route('transaksi-masuk') }}" class="nav-link "><i class="fas fa-calculator"></i> <span>Transaksi</span></a>
      </li>
      <li class="nav-item ">
        <a href="{{ route('riwayat') }}" class="nav-link "><i class="fas fa-calculator"></i> <span>Riwayat Setoran</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-check-alt"></i> <span>Saldo</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('saldo') }}">Saldo</a></li>
          <li><a class="nav-link" href="layout-transparent.html">Riwayat Penarikan</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"><i class="fas fa-chart-line"></i> <span>Penjualan</span></a>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fa fa-book"></i> <span>Laporan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="forms-advanced-form.html">Laporan Transaksi</a></li>
          <li><a class="nav-link" href="forms-editor.html">Laporan Penjualan</a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="{{ route('jenis-sampah') }}" class="nav-link"><i class="fa fa-trash"></i> <span>Jenis Sampah</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fa fa-plus-square"></i> <span>Lain-Lain</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('produk-daur-ulang') }}">Produk</a></li>
          <li><a class="nav-link" href="{{ route('artikel') }}">Artikel</a></li>
        </ul>
      </li>

      <li class="menu-header">TPS3R</li>
      <li class="nav-item ">
        <a href="{{ route('saldo-tps3r') }}" class="nav-link "><i class="far fa-money-bill-alt"></i> <span>Saldo</span></a>
      </li>
      <li class="nav-item ">
        <a href="#" class="nav-link "><i class="fas fa-user-alt"></i> <span>Pemasok</span></a>
      </li>
      @endif
      @if (Auth::user()->hasRole('user'))
      <li class="nav-item ">
        <a href="#" class="nav-link "><i class="fas fa-fire"></i> <span> Dasboard</span></a>
      </li>
      <li class="menu-header">Sampah</li>
      <li class="nav-item ">
        <a href="{{ url('data-sampah')}}" class="nav-link "><i class="fas fa-fire"></i> <span> Daftar Harga Sampah</span></a>
      </li>
      <li class="menu-header">Transaksi</li>
      <li class="nav-item ">
        <a href="{{ route('setor-sampah') }}" class="nav-link "><i class="fas fa-fire"></i> <span> Setor Sampah</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fa fa-plus-square"></i> <span>Transaksi</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="modules-calendar.html">Riwayat Setor</a></li>
          <li><a class="nav-link" href="modules-chartjs.html">Saldo</a></li>
          <li><a class="nav-link" href="modules-calendar.html">Laporan</a></li>
        </ul>
      </li>
      @endif
    </ul>
  </aside>
</div>