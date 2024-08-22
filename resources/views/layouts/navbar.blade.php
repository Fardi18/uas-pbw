<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark sticky-top"
    arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="/" rel="tooltip" data-placement="bottom">
            <img src="{{ asset('css/logo.png') }}" alt="" style="width: 60px; border-radius: 60px">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li><a class="nav-link" href="{{ url('servicepage') }}">Service</a></li>
                <li><a class="nav-link" href="{{ url('productpage') }}">Product</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                {{-- <li><a class="nav-link" href="#"><img src="images/user.svg"></a></li> --}}
                {{-- <li><a class="nav-link" href="cart.html"><img src="images/cart.svg"></a></li> --}}
                @guest
                    <a href="{{ route('login') }}" class="btn btn-lg login btn-outline-primary mx-2">Login</a>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @auth
                                {{ Auth::user()->name }}
                            @endauth
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ '/profileuser' }}">Profile User</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ '/cart' }}">Keranjang</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ '/logout' }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>

</nav>
