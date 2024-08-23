@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div>
                        <h1>Detail Produk <br> {{ $product->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-5">
        <div class="container my-4">
            <div class="row gx-lg-5 d-flex align-items-center">
                <div class="col-lg-8 mb-5">
                    <img src="{{ asset('images/' . $product->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-4">
                    <h1>{{ $product->name }}</h1>
                    <div class="">
                        <p class="m-0">Stock: {{ $product->stock }}</p>
                        <p class="m-0">Berat: {{ $product->weight }}kg</p>
                        <p class="m-0">Nama Bengkel: {{ $product->bengkel->name }}</p>
                    </div>
                    <h4 class="mt-3 mb-5">Rp{{ number_format($product->price) }}</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('add_toCart', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="bengkel_id" value="{{ $product->bengkel->id }}">
                        <button class="btn btn-md btn-primary mt-2 w-100" id="cartButton">Masukkan ke Keranjang</button>
                    </form>
                </div>
            </div>
            <div class="row bg-light p-5 my-5">
                <div class="col">
                    <h3 class="mb-3">Deskripsi</h3>
                    <p style="text-align: justify">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
