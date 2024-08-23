@extends('layouts.app')

@section('title', 'Product')

@section('content')
    {{-- hero --}}
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    <section class="">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col col-lg-4">
                    <h3>Cari produk kebutuhan kendaraanmu disini</h3>
                </div>
                <div class="col col-lg-4">
                    <form action="" method="GET">
                        @csrf
                        <input type="text" class="form-control" placeholder="Cari produk disini" name="keyword">
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- service --}}
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 bengkel">
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="/detailproductpage/{{ $product->id }}">
                            <img src="{{ asset('images/' . $product->image) }}" class="img-fluid product-thumbnail"
                                style="height: 280px; object-fit: cover">
                            <div class="d-flex justify-content-between align-items-end px-3">
                                <div>
                                    <h3 class="product-title">{{ $product->name }}</h3>
                                    <h3 class="product-title">{{ $product->bengkel->name }}</h3>
                                </div>
                                <h3 class="product-price">Rp{{ number_format($product->price) }}</h1>
                            </div>
                            <span class="icon-cross" href="/detailproductpage/{{ $product->id }}">
                                <img src="{{ asset('/user-tamplate/images/cross.svg') }}" class="img-fluid">
                            </span>
                        </a>
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
