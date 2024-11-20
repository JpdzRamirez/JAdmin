{{-- header section --}}
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('assets/img/welcome/logo.png') }}" alt="Psiquiatria">
            <h1 class="sitename">Seleccion</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="#contact">Contact</a></li>
                @if (Route::has('login'))
                        @auth
                        <li>
                            <a href="{{ url('/dashboard') }}">
                                Dashboard
                            </a>
                        </li>    
                        @else
                        <li>
                            <a href="{{ route('login') }}">
                                Log in
                            </a>
                        </li>
                            @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                            @endif
                        @endauth
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>

{{-- END header section --}}
