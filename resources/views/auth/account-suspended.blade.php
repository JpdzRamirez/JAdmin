<x-guest-layout>
    @push('guestStyles')
    <link rel="stylesheet" href="{{asset('assets/css/authentication.css')}}" />
    @endpush
    @push('background')
    <img class="bg-authenticate" src="{{asset('assets/img/backgrounds/login-background.jpg')}}" alt="BackGround-Authenticate">
    @endpush
        {{-- Mensaje de reenvio --}}
        <div class="form-container sign-in-container" id="sign-in">
            <img src="{{ asset('assets/img/security2.png') }}" alt="">            
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <div class="nav-container">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('assets/img/svg/homeBack.svg')}}" class="nav-link" alt="Return">
                        </a>
                    </div>
                    <h1>{{ __('auth.account-suspeded-title') }}</h1>                    
                    @if ($errors->has('account-dissabled'))
                        <div class="alert alert-danger">
                            {{ $errors->first('account-dissabled') }}
                        </div>
                    @endif
                    <span>{{ __('auth.account-suspeded-call') }}</span>
                    <a href="{{ route('home') }}">
                        <button class="ghost" id="return">{{ __('auth.account-suspeded-button') }}</button>
                    </a>                    
                </div>
            </div>
        </div>

</x-guest-layout>
