@extends('layouts.app')

@section('title')
SEMANDING
@endsection
<style>
    .default-padding {
        padding-top: 120px;
        padding-bottom: 120px;
    }

    .default-padding,
    .default-padding-top,
    .default-padding-bottom,
    .default-padding-mx {
        position: relative;
        z-index: 1;
    }

    .hibiscus .about-area .thumb .overlay {
        background: #009DFB;
    }

    .about-area .thumb {
        margin-right: 35px;
        position: relative;
    }

    .img {
        height: auto;
        max-width: 100%;
        border: none;
        -webkit-border-radius: 0;
        border-radius: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .hibiscus h2.text-blur {
        color: #FF9E53;
    }

    .hibiscus .about-area .info>h5 {
        color: #FF9E53;
    }

    .about-area .info>h5 {
        color: #FF9E53;
        text-transform: uppercase;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .about-area .info h2 {
        font-weight: 700;
        margin-bottom: 25px;
    }

    .area-title {
        font-size: 40px;
        line-height: 1.2;
    }

    h2.text-blur {
        position: absolute;
        top: -50px;
        font-size: 120px;
        opacity: 0.08;
        line-height: 1;
        color: #FF9E53;
        z-index: -1;
        font-weight: 700;
    }

    .about-area .thumb .overlay {
        position: absolute;
        right: 30px;
        bottom: 30px;
        max-width: 250px;
        background: #071C4D;
        ;
        text-align: center;
        padding: 50px;
        outline: 1px dashed rgba(255, 255, 255, 0.6);
        outline-offset: -15px;
    }

    .info {
        position: relative;
        z-index: 1;
    }
</style>
@section('content')
<header class="text-center">
    <h1>
        Tentang Kami
    </h1>
    <p class="mt-3">
        Kami menawarkan produk hasil daur ulang dan kami juga menerima sampah non-organik
        <br />
        untuk kami beli bagi masyarakat Kecamatan Kanigoro, Kabupaten Blitar.
    </p>
</header>
<div class="about-area default-padding">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6">
                <div class="thumb">
                    <img width="85%" src="frontend/images/overlay.jpg" alt="Thumb">
                    <div class="overlay">
                        <h4 style="color: white;">Zero Waste Melalui Semanding Berseri</h4>
                    </div>
                </div>
            </div>
            <br /><br />
            <div class="col-lg-6 info">
                <h5>Tentang Kami</h5>
                <h2 class="text-blur">Tentang</h2>
                <h2 class="area-title">Bank Sampah Semanding Berseri</h2>
                <p>Bank Sampah Semanding berseri merupakan sebuah bank sampah yang berada
                        di Kecamatan Kanigoro, Kabupaten Blitar. Bank Sampah ini menerima sampah
                        berupa sampah an-organik. Untuk Bank Sampah ini diperuntukkan masyarakat
                        Kecamatan Kanigoro, Kabupaten Blitar.</p>
            </div>

        </div>
    </div>
</div>
@endsection