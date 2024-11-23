<x-app-layout>
    <div class="main-panel">
        <div class="main-header">
            @include('components.head.head')
        </div>
        <div class="container">
        <div class="page-inner">
            @switch(auth()->user()->rol)
                @case(1)
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
                @case(2)
                    @livewire('pages.admin')
                    @break
                @case(3)
                    @livewire('pages.admin')
                    @break
                @case(4)
                    @livewire('pages.admin')
                    @break
                @default
                    @livewire('pages.unauthorized')
            @endswitch
                </div>
            </div>
            <footer class="footer">
                @include('components.sections.dashboard.footer.footer')
            </footer>
        </div>  
</x-app-layout>