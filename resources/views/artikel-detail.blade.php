@extends('layouts.app')

@section('title')
SEMANDING
@endsection

<link rel="stylesheet" href="../assets/css/components.css">

@section('content')

<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                Artikel
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                @foreach($detail_artikels as $detail_artikel)
                <div class="col-lg-12 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $detail_artikel->title }}</h1>
                        <p>
                            {{ $detail_artikel->user->name }},  {{ $detail_artikel->created_at}}
                        </p>
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img class="xzoom" id="xzoom-default" src="{{ url('frontend/images/Artikel') }}/{{ $detail_artikel->gambar_artikel }}" xoriginal="{{ url('frontend/images/Artikel') }}/{{ $detail_artikel->gambar_artikel }}" />
                            </div>
                            <p style="text-align:justify;">
                                {{ $detail_artikel->content }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection