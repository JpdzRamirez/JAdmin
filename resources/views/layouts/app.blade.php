<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title',  __('general.title'))
    </title>

    {{-- Fonts --}}    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Personal CSS Files --}}
    {{-- <link rel="stylesheet" href="assets/css/kaiadmin.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    {{-- Scripts --}}
    @vite(['public/assets/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('appStyles')
</head>

<body class="font-sans antialiased">
    <div id="spinner" class="ring hidden">
        {{ __('general.spinner-message') }}
        <span></span>
    </div>
    <div id="preloader"></div>
    <div class="min-h-screen bg-gray-100 ">
        {{-- Page Content --}}
        <main>
            <div class="wrapper">
                <div class="slidebar">
                    @include('components.sections.dashboard.sidebar')
                </div>
                {{ $slot }}
            </div>
        </main>
    </div>
    @stack('dashboardModal')
    @livewireScripts
    {{-- jQuery core --}}
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    {{-- Bootstrap poppers --}}
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    {{-- Bootstrap javascript --}}
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    {{-- jQuery Scrollbar --}}
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    {{-- Sweet Alert --}}
    <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
    {{-- Bootstrap Notify --}}
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    {{-- Lottie animations js --}}
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>    
    {{-- PERSONAL SCRIPTS --}}
    <script src="{{ asset('assets/js/plugin/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/JAdmin.js') }}"></script>    
    <script src="{{ asset('assets/js/setting-demo.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('assets/js/preloader.js') }}"></script>
    @stack('dashboardScripts')
    @stack('scripts')
</body>

</html>
