@extends('layouts.app')

@section('title')
SEMANDING
@endsection

<link rel="stylesheet" href="../assets/css/components.css">

@section('content')

<header class="text-center">
    <h1>
        Artikel Semanding
    </h1>
    <p class="mt-3">
        Artikel-artikel ini mengenai Bank Sampah Semanding Berseri
        <br />
        Artikel terbaru baca dibawah ini.
    </p>
</header>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row" style="padding: 80px;">
                @foreach($artikels as $artikel)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <article class="article">
                        <div class="article-header">
                        <img class="article-image" src="{{ url('frontend/images/Artikel') }}/{{ $artikel->gambar_artikel }}" />
                            <div class="article-title">
                                <h2><a href="#">{{ $artikel->title }}</a></h2>
                            </div>
                        </div>
                        <div class="article-details">
                            <p>{{  substr($artikel->content, 0, 100) }}... </p>
                            <div class="article-cta">
                                <a href="{{ url('artikels/detail') }}/{{ $artikel->id }}" class="btn" style="background-color: #071C4D; color: white;">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </article>
                </div>
                
            @endforeach
            </div>
        </div>
    </section>
</div>
@endsection