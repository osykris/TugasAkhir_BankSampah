@extends('layouts.app')
<script src="https://kit.fontawesome.com/a87e9d7c5f.js" crossorigin="anonymous"></script>
@section('content')
<header class="text-center">
    <h1>
        Produk Daur Ulang
    </h1>
    <p class="mt-3">
        Kami menawarkan berbagai produk hasil daur ulang yang berkualitas bagus dan terjamin awet.
    </p>
</header>
<div class="container py-4">
    <div class="row mb-2">
        <div class="col">
        <h4><b> Pilih Produk Kesukaanmu Disini </b></h4>
        </div>
        <div class="col-md-3" style="float: right;">
            <div class="input-group mb-8">
                <form action="{{ url('cari') }}" method="GET">
                    <input type="text" name="nama" placeholder="Cari berdasarkan nama" class="form-control bg-white">
                </form>
                <div class="input-group-prepend">
                    <span class="input-group-text" style="background-color: #FF9E53; width:40px;  height: 40px;"" id="basic-addon1">
                        <i class="fas fa-search" style="color: white; "></i>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <section class="products mb-5">
        <div class="row mt-4">
            @foreach($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url('frontend/images/Produk') }}/{{ $product->gambar }}" class="img-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5 <strong>{{ $product->nama }}</strong> </h5>
                                <h6><b>Rp. {{ number_format($product->harga) }}</b></h6>
                                <h6>{{ $product->deskripsi }}</h6>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-block" style="background-color: #071C4D; color: white;"> Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection