<footer class="footer-section">
    <div class="container relative">

        {{-- <div class="sofa-img">
            <img src="{{ asset('/user-tamplate/images/sofa.png') }}" alt="Image" class="img-fluid">
        </div> --}}
        <div class="row g-5 mb-5">
            <div class="col-lg-8">
                <div class="mb-4 footer-logo-wrap">
                    <a href="/" class="footer-logo">
                        <img src="{{ asset('css/logo.png') }}" alt="" style="width: 100px; border-radius: 60px">
                    </a>
                </div>
                <p class="mb-4">CARS adalah sebuah website yang menyediakan layanan berupa Booking
                    Bengkel secara online sehingga Kamu dan Bengkel dapat terhubung dengan cepat. Pada website ini juga
                    tersedia jual beli sparepart untuk kebutuhan kendaraan kamu.</p>

                <ul class="list-unstyled custom-social">
                    <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <div class="row links-wrap">
                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Menu</a></li>
                            <li>
                                <a href="{{ url('/') }}" class="mt-3">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/productpage') }}" class="mt-2">
                                    Produk
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/servicepage') }}" class="mt-2">
                                    Service
                                </a>
                            </li>
                            <li>
                                @guest
                                    <a href="{{ route('login') }}" class="mt-2">
                                        Login
                                    </a>
                                @endguest
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6">
                    <ul class="list-unstyled d-inline-flex ms-auto">
                        <li class="me-4"><a href="#">CARS</a></li>
                    </ul>
                </div>

                <div class="col-lg-6 text-center text-lg-end">
                    <ul class="list-unstyled d-inline-flex ms-auto">
                        <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</footer>
