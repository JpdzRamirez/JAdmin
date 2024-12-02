<x-app-layout>
    <div class="main-panel">
        <div class="main-header">
            @include('components.head.head')
        </div>
        <div class="container">
            <div class="page-inner">            
                {{-- Card ZONE --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-form">
                            <div class="card-header">                                
                                <div class="card-title">{{ __('exceptions.title') }}</div>
                                <h2 style="text-align: center">{!! __('exceptions.not-found') !!}</h2>
                                {{-- Mostrar el mensaje de error aquí --}}
                                @if(isset($message))
                                    <p><u>{{ __('exceptions.error') }}</u> 
                                        <i class="fa-solid fa-caret-right"></i> {{ $message }}
                                    </p> 
                                @else
                                    <p style="text-align: center">{{ __('exceptions.default') }}</p>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="card-category d-flex flex-row justify-content-center">
                                    <lottie-player src="{{ asset('assets/lottie/404.json') }}" background="transparent"
                                        speed="1" style="width: 300px; height: 300px;" loop nocontrols autoplay></lottie-player>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <footer class="footer">
                @include('components.sections.dashboard.footer.footer')
            </footer>
        </div>  
</x-app-layout>