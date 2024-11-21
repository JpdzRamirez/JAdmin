<x-guest-layout>
    @push('guestStyles')
    <link rel="stylesheet" href="{{asset('assets/css/authentication.css')}}" />
    @endpush
    @push('background')
    <img class="bg-authenticate" src="{{asset('assets/img/backgrounds/login-background.jpg')}}" alt="BackGround-Authenticate">
    @endpush
        {{-- Mensaje de reenvio --}}
        <div class="form-container sign-in-container" id="sign-in">
            <img src="{{ asset('assets/img/terms.png') }}" alt="">            
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right terms_policy" style="justify-content: unset">
                    <div class="nav-container">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('assets/img/svg/homeBack.svg')}}" class="nav-link" alt="Return">
                        </a>
                    </div>
                    <h1>{{ __('terms_policy.terms-title') }}</h1>
                    <div class="terms_policy-content">                        
                        <div class="content-policy">
                            <p>{!! $terms !!}</p>
                        </div>
                    </div>
                    <a href="{{ route('home') }}">
                        <button class="ghost" id="signUp">{{ __('terms_policy.t&p-button') }}</button>
                    </a>                    
                </div>
            </div>
        </div>
</x-guest-layout>
