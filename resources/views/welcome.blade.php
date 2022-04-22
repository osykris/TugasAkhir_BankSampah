@extends('layouts.app')

@section('title')
SEMANDING
@endsection

@section('content')
<!-- Header -->
<header class="text-center">
  <h1>
    Bank Sampah
    <br />
    Semanding Berseri
  </h1>
  <p class="mt-3">
    Kami menawarkan produk hasil daur ulang dan kami juga menerima sampah non-organik
    <br />
    untuk kami beli bagi masyarakat Kecamatan Kanigoro, Kabupaten Blitar.
  </p>
  <a href="{{ route('login') }}" class="btn btn-get-started px-4 mt-4">
    Mulai Sekarang
  </a>
</header>

<main>
  <div class="container">
    <section class="section-stats row justify-content-center" id="stats">
      <div class="col-3 col-md-2 stats-detail">
        <h2>{{ $count_nasabah }}</h2>
        <p>Nasabah</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>11</h2>
        <p>Desa</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>20</h2>
        <p>Anggota Tim</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>72</h2>
        <p>Partners</p>
      </div>
    </section>
  </div>

  <section class="section-popular" id="popular">
    <div class="container">
      <div class="row">
        <div class="col text-center section-popular-heading">
          <h2>Produk Best Seller</h2>
          <p>
            Cobalah sesuatu yang baru dengan produk daur ulang
            <br />
            ramah lingkungan dan berkualitas.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section-popular-content" id="popularContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center">
        @foreach($items as $item)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card-travel text-center d-flex flex-column" style="background-image: url('frontend/images/Produk/{{ $item->gambar }}');">
            <div class="travel-country" style="color: #FF9E53;">Rp. {{ number_format($item->harga) }}</div>
            <div class="travel-location"><b> {{ $item->nama }} </b></div>
            <div class="travel-button mt-auto">
              <a href="#" class="btn btn-travel-details px-4">
                Beli
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="section-networks" id="networks">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2>Jenis-Jenis Sampah</h2>
          <p>
            Sampah yang kami terima berupa
            <br />
            sampah anorganik yang sudah di pilah-pilah.
          </p>
        </div>
        <div class="col-md-8 text-center">
          <img src="frontend/images/bag5.png" alt="Logo Partner" class="img-partner" />
        </div>
      </div>
    </div>
  </section>

  <section class="section-testimonial-heading" id="testimonialHeading">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>Artikel Terbaru</h2>
          <p>
            Baca artikel terbaru dari kami
            <br />
            mengenai berita terkini maupunn informasi-informasi.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-testimonial-content" id="testimonialContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center">
        @foreach($artikels as $artikel)
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testiominal-content">
              <img src="{{ url('frontend/images/Artikel') }}/{{ $artikel->gambar_artikel }}" width="100px"  hight="50px" alt="User" class="mb-4 rounded-circle" />
              <h3 class="mb-4">{{ $artikel->user->name }}</h3>
              <p class="testimonial">
                “ {{  substr($artikel->content, 0, 75) }} ...“ <a style="font-size: 20px;" href="{{ url('artikels/detail') }}/{{ $artikel->id }}">Baca Selengkapnya</a>
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">
              {{ $artikel->title }}
            </p>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
            Butuh Bantuan
          </a>
          <a href="{{ route('login') }}" class="btn btn-get-started px-4 mt-4 mx-1">
            Mulai Sekarang
          </a>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection