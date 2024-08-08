@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

    <div class="detail-bengkel p-5">
        <div class="container my-4">
            <div class="row gx-lg-5 d-flex align-items-center">
                <div class="col-lg-6 mb-5">
                    <img src="{{ asset('images/' . $product->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <h1>{{ $product->name }}</h1>
                    <div class="d-flex align-items-center justify-content-between my-3">
                        <div>
                            <h5>Stock: {{ $product->stock }}</h5>
                            <h5>Berat: {{ $product->weight }}kg</h5>
                        </div>
                        <h2>Rp{{ number_format($product->price) }}</h2>
                    </div>

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
            <div class="row option p-3">
                <div class="col">
                    <h3 class="mb-3">Deskripsi</h3>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
