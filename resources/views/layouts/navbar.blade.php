<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark sticky-top" aria-label="Furni navigation bar">
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
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item {{ Request::is('servicepage') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('servicepage') }}">Service</a>
                </li>
                <li class="nav-item {{ Request::is('productpage') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('productpage') }}">Product</a>
                </li>
            </ul>
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-lg login btn-outline-primary mx-2">Login</a>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/profileuser') }}">Profile User</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/cart') }}">Keranjang</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
