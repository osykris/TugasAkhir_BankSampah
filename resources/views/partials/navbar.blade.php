<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    @if (Auth::user()->hasRole('admin'))
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Pesan
        </div>
        <div class="dropdown-list-content dropdown-list-message">
          @php
          $kontak = App\Models\Kontak::orderBy('id', 'desc')->get();
          @endphp
          @foreach($kontak as $kontaks)
          <div class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-desc">
              <b>{{ $kontaks->nama }}</b>
              <p>{{ $kontaks->email }}, {{ $kontaks->nohp }}</p>
              <p>{{ $kontaks->pesan }}</p>
              <div class="time" style="color: red;">
                {{ \Carbon\Carbon::parse($kontaks->updated_at)->diffForHumans(); }}
                <button class="btn btn-sm btn-white me-2" style="color: red" onclick="hapus_pesan('{{ $kontaks->id }}')">Hapus <i class='fas fa-times'></i></button>
              </div>

            </div>
          </div>
          @endforeach
          @if(empty($kontak))
          <b>Tidak Ada Pesan</b>
          @endif
        </div>
      </div>
    </li>
    @endif
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ route('profile-nasabah') }}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="route('logout')" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                                        this.closest('form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </form>

      </div>
    </li>
  </ul>
</nav>
<!-- Modal Hapus Pesan -->
<div class="modal fade" id="ModalHapusPesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus pesan dari user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-pesan">Hapus Data</button>
            </div>
        </div>
    </div>
</div>