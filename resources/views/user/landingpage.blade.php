@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    {{-- <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script> --}}
    {{-- hero --}}
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="intro-excerpt">
                        <h1>Welcome to <br>CARS</h1>
                        <p class="mb-4">CARS adalah sebuah website yang menyediakan layanan berupa Booking
                            Bengkel secara online sehingga Kamu dan Bengkel dapat terhubung dengan cepat. Pada website ini
                            juga tersedia jual beli sparepart untuk kebutuhan kendaraan kamu.</p>
                        <p><a href="/servicepage" class="btn btn-secondary me-2">Get Started</a></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img-wrap">
                        {{-- <img src="{{ asset('/user-tamplate/images/sofa.png') }}" class="img-fluid"> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4">Dapatkan Kebutuhan Kendaraanmu</h2>
                    <p class="mb-4">Di CARS kamu juga bisa membeli kebutuhan kendaraan mu, semuanya ada di Repair
                        X Shop</p>
                    <p><a href="/productpage" class="btn">Explore</a></p>
                </div>
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="/detailproductpage/{{ $product->id }}">
                            <img src="{{ asset('images/' . $product->image) }}" class="img-fluid product-thumbnail"
                                style="height: 260px; object-fit: cover">
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
        </div>
    </div>
    <!-- End Product Section -->
    {{-- keunggulan --}}
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">Why Choose Us</h2>
                    <p>Berikut adalah beberapa hal penting yang harus kamu tahu mengapa harus memilih kami sebagai partner
                        untuk memperbaiki kendaraanmu.</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('/user-tamplate/images/truck.svg') }}" alt="Image"
                                        class="imf-fluid">
                                </div>
                                <h3>Connected</h3>
                                <p>CARS membantu kamu untuk terhubung dengan bengkel sehingga akan lebih mudah jika
                                    terjadi kerusakan pada Kendaraan yang kamu miliki</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('css/icon-transparan.png') }}" alt="Image"
                                        style="width: 46px; height: 46px;" class="imf-fluid">
                                </div>
                                <h3>Harga Transparan</h3>
                                <p>
                                    Tidak perlu takut dengan harga perbaikan kendaraan kamu, karena kamu bisa melihat harga
                                    dari setiap perbaikan di halaman detail bengkel
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('/user-tamplate/images/support.svg') }}" alt="Image"
                                        class="imf-fluid">
                                </div>
                                <h3>Terpercaya</h3>
                                <p>Selain tidak perlu takut akan harga, kamu juga tidak perlu takut dengan mitra Kami,
                                    karena mitra yang telah terdaftar di Bengkelin sudah pasti terpercaya</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('/user-tamplate/images/bag.svg') }}" alt="Image"
                                        class="imf-fluid">
                                </div>
                                <h3>Easy to Shop</h3>
                                <p>Belinya pake handphone bayarnya juga pakai handphone. Dapatkan kemudahan tersebut di
                                    CARS</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ asset('/css/service-mobil.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- chatbot --}}
    <div class="we-help-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1"><img src="{{ asset('/css/chatbot2.jpg') }}" alt="Untree.co"></div>
                        <div class="grid grid-2"><img src="{{ asset('/css/chatbot3.jpg') }}" alt="Untree.co"></div>
                        <div class="grid grid-3"><img src="{{ asset('/css/chatbot1.jpg') }}" alt="Untree.co"></div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">We Help You Make with a Modern Ways</h2>
                    <p>Aplikasi CARS ini memiliki chatbot yang bernama ReshopBot yang akan membantu kamu untuk
                        lebih mengeksplorasi
                        fitur-fitur dan mendapatkan informasi yang kamu butuhkan. ReshopBot ini bisa kamu gunakan untuk
                        mendapatkan: </p>

                    <ul class="list-unstyled custom-list my-4">
                        <li>Mendapatkan informasi mengenai pendaftaran akun</li>
                        <li>Mencari informasi bengkel terdekat dengan lokasimu</li>
                        <li>Membantu untuk mendapatkan informasi lainnya</li>
                    </ul>
                    {{-- <p><a herf="/servicepage" class="btn">Explore</a></p> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        var botmanWidget = {
            aboutText: 'Bengkelin',
            introMessage: "Halo, Selamat Datang di Bengkelin<br>Silahkan pilih topik:<br>1. Pengiriman Produk<br>2. Layanan Bengkel<br>3. Cara Mendaftar Akun"
        };
    </script>
@endsection
