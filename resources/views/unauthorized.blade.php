<x-guest-layout>
    @push('guestStyles')
    <link rel="stylesheet" href="{{asset('assets/css/authentication.css')}}" />
    @endpush
    @push('background')
    <img class="bg-authenticate" src="{{asset('assets/img/backgrounds/login-background.jpg')}}" alt="BackGround-Authenticate">
    @endpush
        {{-- Mensaje de reenvio --}}
        <div class="form-container sign-in-container" id="sign-in">
            <img src="{{ asset('assets/img/unauthorized.jpg') }}" alt="">            
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right unauthorized" style="justify-content: unset">
                    <div class="nav-container">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('assets/img/svg/homeBack.svg')}}" class="nav-link" alt="Return">
                        </a>
                    </div>
                    <h1>{{ __('auth.unauthorized-title') }}</h1>
                    <div class="unauthorized-content">                        
                        <div class="content-policy">
                            <p>{{ __('auth.unauthorized-content') }}</p>
                        </div>
                        <span>{{ __('auth.registered-call') }}</span>
                        <a href="{{ route('verification.resend') }}">
                            <button class="ghost" id="signUp">
                                <i class="fa-sharp fa-solid fa-paper-plane"></i>
                                {{ __('auth.registered-button') }}
                            </button>
                        </a>     
                    </div>                   
                </div>
            </div>
        </div>
</x-guest-layout>