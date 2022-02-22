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
        <h2>20K</h2>
        <p>Nasabah</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>12</h2>
        <p>Desa</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>100</h2>
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
          <img
            src="frontend/images/partner.png"
            alt="Logo Partner"
            class="img-partner"
          />
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

  <section
    class="section section-testimonial-content"
    id="testimonialContent"
  >
    <div class="container">
      <div class="section-popular-travel row justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testiominal-content">
              <img
                src="frontend/images/testimonial-1.png"
                alt="User"
                class="mb-4 rounded-circle"
              />
              <h3 class="mb-4">Angga Risky</h3>
              <p class="testimonial">
                “ It was glorious and I could not stop to say wohooo for
                every single moment Dankeeeeee “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">
              Trip to Ubud
            </p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testiominal-content">
              <img
                src="frontend/images/testimonial-2.png"
                alt="User"
                class="mb-4 rounded-circle"
              />
              <h3 class="mb-4">Shayna</h3>
              <p class="testimonial">
                “ The trip was amazing and I saw something beautiful in that
                Island that makes me want to learn more “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">
              Trip to Nusa Penida
            </p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testiominal-content">
              <img
                src="frontend/images/testimonial-3.png"
                alt="User"
                class="mb-4 rounded-circle"
              />
              <h3 class="mb-4">Shabrina</h3>
              <p class="testimonial">
                “ I loved it when the waves was shaking harder — I was
                scared too “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">
              Trip to Karimun Jawa
            </p>
          </div>
        </div>
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
