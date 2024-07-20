@extends('layouts.app')

@section('title', 'Detail Bengkel')

@section('content')

    <div class="detail-bengkel p-5">
        @foreach ($bengkels as $bengkel)
            <div class="container my-4">
                <div class="row gx-lg-5 d-flex align-items-center">
                    <div class="col-lg-6 mb-5">
                        <img src="{{ asset('images/' . $bengkel->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h1>{{ $bengkel->name }}</h1>
                        <div class="desc-bengkel-lokasi d-flex align-items-center">
                            <img src="{{ asset('css/icon-location.png') }}" alt="">
                            <h5>{{ $bengkel->alamat }}, {{ $bengkel->kecamatan->name }}, {{ $bengkel->kelurahan->name }}
                            </h5>
                        </div>
                        <p>{{ $bengkel->description }}</p>
                    </div>
                </div>
                <div class="row my-5 informasi-tambahan">
                    <div class="detail-bengkel-informasi-tambahan d-flex align-items-center">
                        <img src="{{ asset('css/icon-informasi.png') }}" alt="">
                        <h3 class="mb-0 mx-4">Informasi Tambahan</h3>
                    </div>
                    <div class="col">
                        <h5>Daftar Service</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Service</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bengkel->layanans as $layanan)
                                    <tr>
                                        <td>{{ $layanan->name }}</td>
                                        <td>Rp{{ number_format($layanan->price) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Daftar Produk</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Gambar Produk</th>
                                    <th scope="col">Harga Produk</th>
                                    <th scope="col">Stok Produk</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bengkel->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $product->image) }}" alt=""
                                                style="width: 100px; height:auto">
                                        </td>
                                        <td>Rp{{ number_format($product->price) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <a href="/detailproductpage/{{ $product->id }}"
                                                class="btn btn-primary w-100">Lihat
                                                Product</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Jadwal Operasional</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bengkel->jadwals as $jadwal)
                                    <tr>
                                        <td>Senin</td>
                                        <td>{{ $jadwal->senin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Selasa</td>
                                        <td>{{ $jadwal->selasa }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rabu</td>
                                        <td>{{ $jadwal->rabu }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kamis</td>
                                        <td>{{ $jadwal->kamis }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumat</td>
                                        <td>{{ $jadwal->jumat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sabtu</td>
                                        <td>{{ $jadwal->sabtu }}</td>
                                    </tr>
                                    <tr>
                                        <td>Minggu</td>
                                        <td>{{ $jadwal->minggu }}</td>
                                    </tr>
                                    <tr>
                                        <td>Libur Nasional</td>
                                        <td>Tutup</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row option p-3">
                    <div class="col d-flex justify-content-between align-items-center">
                        <div class="nama-bengkel">
                            <h5>{{ $bengkel->name }}</h5>
                            <a href="{{ $bengkel->link_alamat }}">Lihat di Peta >>></a>
                        </div>
                        <div class="hubungi">
                            <a href="/booking/add/{{ $bengkel->id }}" class="btn btn-lg btn-primary pesan-bengkel">Pesan
                                Bengkel</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
