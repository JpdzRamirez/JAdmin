<x-app-layout>
            @switch(auth()->user()->rol)
                @case(1)
                    @livewire('pages.admin')
                    @push('dashboardScripts')
                        {{-- jQuery Scrollbar --}}
                        <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
                
                        {{-- Datatables --}}
                        <script src="assets/js/plugin/datatables/datatables.min.js"></script>
                
                        {{-- jQuery Vector Maps --}}
                        <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
                        <script src="assets/js/plugin/jsvectormap/world.js"></script>
                
                        {{-- Chart js --}}
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
                <div class="main-panel">
                    <div class="main-header">

                    </div>
                    <div class="container">
                        <div class="page-inner">
                            @livewire('pages.unauthorized')
                        </div>
                    </div>
                    <footer class="footer">
                        @include('components.sections.dashboard.footer.footer')
                    </footer>
                </div>                    
            @endswitch
</x-app-layout>