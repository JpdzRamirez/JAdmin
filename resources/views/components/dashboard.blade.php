<x-app-layout>
    <div class="wrapper">
        @include('livewire.components.sidebar')
        {{-- Sidebar Section --}}
        <div class="main-panel">
            @include('components.head.head')
            <div class="container">
                <div class="page-inner">
                    {{-- COMPONENTE LIVEWIRE RENDERIZABLE --}}
                                    {{ $slot }}
                    {{-- END COMPONENTE LIVEWIRE RENDERIZABLE --}}
                </div>
            </div>
            @include('livewire.footer.footer')
        </div>
        {{-- End Custom template --}}
    </div>
</x-app-layout>
