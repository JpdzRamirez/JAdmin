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
                            @if(auth()->user()->email_verified_at)
                                {{-- Usuario verificado --}}
                                @switch(auth()->user()->roles->id)
                                    @case(1)
                                        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                        @break

                                    @case(2)
                                        <a href="{{ route('doctor.dashboard') }}">Doctor Dashboard</a>
                                        @break

                                    @case(3)
                                        <a href="{{ route('assistant.dashboard')}}">Assitant Dashboard</a>
                                        @break

                                    @case(4)
                                        <a href="{{ route('customer.dashboard') }}">Customer Dashboard</a>
                                        @break
                                    @default
                                    {{-- Si el usuario está verificado pero no cuenta con un rol --}}
                                        <a href="{{ route('unauthorized.dashboard') }}">Default Dashboard</a>
                                @endswitch
                            @else
                                {{-- Si el correo no está verificado --}}
                                <a href="{{ route('unauthorized') }}">
                                    {{ __('auth.registered-button-verify') }}
                                </a>
                            @endif
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
