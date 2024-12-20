<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', __('general.title'))
    </title>
    
    @stack('guestStyles')
    @livewireStyles
</head>

<body>
    <!-- Preloader -->
    <div id="preloader"></div>
    @stack('background')
    <div class="container" id="container">
        {{ $slot }}
    </div>
    @livewireScripts
    @stack('guestScripts')
    <!-- Main JS File -->
    <script src="{{ asset('assets/js/preloader.js') }}"></script>
</body>

</html>
