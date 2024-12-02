<x-app-layout>
    <div class="main-panel">
        <div class="main-header">
            @include('components.head.head')
        </div>
        <div class="container">
            <div class="page-inner">            
                @livewire('pages.profile.profile-user', ['userID' => $userID])
            </div>
        </div>
            <footer class="footer">
                @include('components.sections.dashboard.footer.footer')
            </footer>
        </div>  
</x-app-layout>