@extends('mitra.layouts.app')

@section('title', 'Tambah Transaksi')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Transaksi</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Gambar Produk</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>{{ $product->name }}</td>
                                                        <td>
                                                            <img src="{{ asset('images/' . $product->image) }}"
                                                                alt="{{ $product->name }}" style="width: 100px">
                                                        </td>
                                                        <td>Rp{{ number_format($product->price) }}</td>
                                                        <td>{{ $product->stock }}</td>
                                                        <td>
                                                            <form action="{{ route('add.to.cart', $product->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="quantity" value="1">
                                                                <input type="hidden" name="bengkel_id"
                                                                    value="{{ $product->bengkel->id }}">
                                                                <input type="hidden" name="booking_id"
                                                                    value="{{ $booking->id }}">
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">
                                                                <button class="btn btn-md btn-primary mt-2 w-100"
                                                                    id="cartButton">Masukkan ke Keranjang</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nama Layanan</th>
                                                    <th>Harga</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($services as $layanan)
                                                    <tr>
                                                        <td>{{ $layanan->name }}</td>
                                                        <td>Rp{{ number_format($layanan->price) }}</td>
                                                        <td>
                                                            <form action="{{ route('add.to.cart', $layanan->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="quantity" value="1">
                                                                <input type="hidden" name="bengkel_id"
                                                                    value="{{ $layanan->bengkel->id }}">
                                                                <input type="hidden" name="booking_id"
                                                                    value="{{ $booking->id }}">
                                                                <input type="hidden" name="layanan_id"
                                                                    value="{{ $layanan->id }}">
                                                                <button class="btn btn-md btn-primary mt-2 w-100"
                                                                    id="cartButton">Masukkan ke Keranjang</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h3>Keranjang</h3>
                            <table class="table table-striped mt-2">
                                <thead>
                                    <tr>
                                        <th>Nama Item</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $cart->product ? $cart->product->name : $cart->layanan->name }}</td>
                                            <td>{{ $cart->quantity }}</td>
                                            <td>Rp{{ number_format($cart->price) }}</td>
                                            <td>Rp{{ number_format($cart->price * $cart->quantity) }}</td>
                                            <td>
                                                <form action="{{ route('remove.from.cart', $cart->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-md btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                <h4>Total Harga: Rp{{ number_format($totalPrice) }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <form action="{{ route('checkout.process.owner') }}" method="POST">
                                @csrf
                                <button class="btn btn-md btn-primary w-100">Lanjut untuk Pembayaran</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
