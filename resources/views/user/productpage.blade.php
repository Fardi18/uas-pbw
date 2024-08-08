@extends('layouts.app')

@section('title', 'Product')

@section('content')
    {{-- hero --}}
    {{-- <div class="hero d-flex align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-white fw-bold mb-4">Product Kami</h1>
                    <p class="text-white mb-5 text-opacity-75">
                        Berikut adalah produk yang bisa kami tawarkan untuk Anda
                    </p>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- service --}}
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class=" text-center">
                        <h3 class="title">Mau Beli Apa Hari Ini?</h3>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-lg-8">
                    <form action="" method="GET">
                        @csrf
                        <input type="text" class="form-control" placeholder="Cari produk disini" name="keyword">
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 bengkel">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <h6>Rp{{ number_format($product->price) }}</h6>
                                </div>
                                <p class="text-secondary">Stock: {{ $product->stock }}</p>
                                <a href="/detailproductpage/{{ $product->id }}" class="btn btn-primary w-100">Lihat
                                    Product</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-5">
                <div class="mb-1">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
