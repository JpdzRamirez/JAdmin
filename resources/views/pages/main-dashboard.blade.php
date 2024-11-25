<x-app-layout>
    <div class="main-panel">
        <div class="main-header">
            @include('components.head.head')
        </div>
        <div class="container">
        <div class="page-inner">
            @switch(auth()->user()->role)
                @case(1)
                    @livewire('pages.unauthorized')
                    @push('dashboardScripts')
                        <script src="{{ asset('assets/js/selector.js') }}"></script>
                    @endpush
                    @break
                @case(2)
                    @livewire('pages.admin')
                    @push('dashboardScripts')                
                        {{-- Datatables --}}
                        <script src="assets/js/plugin/datatables/datatables.min.js"></script>                
                        {{-- jQuery Vector Maps --}}
                        <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
                        <script src="assets/js/plugin/jsvectormap/world.js"></script>
                        {{-- Chart js --}}
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    @endpush
                    @break
                @case(3)
                    @livewire('pages.admin')
                    @break
                @case(4)
                    @livewire('pages.admin')
                    @break
                @case(5)
                    @livewire('pages.admin')
                    @break
                @default
                    @push('appStyles')
                        <link rel="stylesheet" href="{{ asset('assets/css/notFound.css') }}">
                    @endpush
                    @livewire('pages.not-found')
                    @push('dashboardScripts') 
                     <script src="{{ asset('assets/js/notFound.js') }}"></script>
                    @endpush
            @endswitch
                </div>
            </div>
            <footer class="footer">
                @include('components.sections.dashboard.footer.footer')
            </footer>
        </div>  
</x-app-layout>