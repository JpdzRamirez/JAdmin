<x-guest-layout>
    @push('guestStyles')
    <link rel="stylesheet" href="{{asset('assets/css/authentication.css')}}" />
    @endpush
    @push('background')
    <img class="bg-authenticate" src="{{asset('assets/img/backgrounds/login-background.jpg')}}" alt="BackGround-Authenticate">
    @endpush
        {{-- Formulario Registro --}}
        <div class="form-container sign-up-container">
            <form method="POST" class="form-wrapper" action="{{ route('register.attempt') }}">
                @csrf
                <h1>{{ __('auth.signup-title') }}</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-github"></i></a>
                </div>
                <span>{{ __('auth.oath-signup') }}</span>
                <input type="text" class="form-control @error('name_create') is-invalid @enderror" placeholder="{{ __('forms.register.name') }}"  name="name_create" value="{{ old('name_create') }}" required autofocus  />
                @error('name_create')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="{{ __('forms.register.lastname') }}" name="lastname" value="{{ old('lastname') }}" required   />
                @error('lastname')
                    <div class="error">{{ $message }}</div>
                @enderror

                <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('forms.register.phone') }}" name="phone" value="{{ old('phone') }}" required   />
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                <input type="email-create" class="form-control @error('email_create') is-invalid @enderror" placeholder="{{ __('forms.register.email') }}" name="email_create" value="{{ old('email_create') }}" required  />
                @error('email_create')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                <div class="password-group">
                    <input type="password" class="check-password  @error('password_create') is-invalid @enderror" placeholder="{{ __('forms.register.password') }}" name="password_create" required  />
                    @error('password_create')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="password-validator up">
                    </div>
                </div>
                <div class="password-group">
                    <input type="password" class="check-password @error('password_create_confirmation') is-invalid @enderror" placeholder="{{ __('forms.register.password-confirm') }}" name="password_create_confirmation" required  />
                    @error('password_create_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="password-validator down">
                    </div>
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="input-checkbox">
                        <label for="terms" class="checkbox @error('terms') is-invalid @enderror">
                            <input type="checkbox" name="terms" id="terms" required  />
                            <svg viewBox="0 0 21 18">
                                <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                </symbol>
                                <defs>
                                    <mask id="tick">
                                        <use class="tick mask" href="#tick-path" />
                                    </mask>
                                </defs>
                                <use class="tick" href="#tick-path" stroke="currentColor" />
                                <path fill="white" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                            </svg>
                            <svg class="lines" viewBox="0 0 11 11">
                                <path d="M5.88086 5.89441L9.53504 4.26746" />
                                <path d="M5.5274 8.78838L9.45391 9.55161" />
                                <path d="M3.49371 4.22065L5.55387 0.79198" />
                            </svg>
                        </label>
                        <span class="ms-2 text-sm text-gray-600">
                            {!! __(__('auth.terms').' :terms_of_service  :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="terms">'.__('auth.terms-service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="terms">'.__('auth.terms-policy').'</a>',
                            ]) !!}
                        </span>
                    </div>
                @endif
                <button type="submit">{{ __('auth.signup') }} <i class="fa-solid fa-user-plus"></i></button>
            </form>
        </div>
        {{-- Formulario Login --}}
        <div class="form-container sign-in-container" id="sign-in">
            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf
                <h1>{{ __('auth.login-title') }}</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-github"></i></i></a>
                </div>
                <span>{{ __('auth.oath-login') }}</span>
                <!-- Email Input -->
                <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" />
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <!-- Password Input -->
                <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password" />
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"> {{ __('auth.forgot-password') }} </a>
                @endif
                <div class="input-checkbox">
                    <label for="remember_me" class="checkbox">
                        <input type="checkbox" id="remember_me" name="remember" />
                        <svg viewBox="0 0 21 18">
                            <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            </symbol>
                            <defs>
                                <mask id="tick">
                                    <use class="tick mask" href="#tick-path" />
                                </mask>
                            </defs>
                            <use class="tick" href="#tick-path" stroke="currentColor" />
                            <path fill="white" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                        </svg>
                        <svg class="lines" viewBox="0 0 11 11">
                            <path d="M5.88086 5.89441L9.53504 4.26746" />
                            <path d="M5.5274 8.78838L9.45391 9.55161" />
                            <path d="M3.49371 4.22065L5.55387 0.79198" />
                        </svg>
                    </label>
                    <span class="remember">{{ __('auth.remember') }}</span>
                </div>
                <button type="submit">{{ __('auth.login') }} <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <div class="nav-container">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('assets/img/svg/homeBack.svg')}}" class="nav-link" alt="Return">
                        </a>
                    </div>
                    <h1>{{ __('auth.welcome-signup') }}</h1>
                    <p>{{ __('auth.welcome-sub-signup') }}</p>
                    <button class="ghost" id="signIn">{{ __('auth.welcome-sub-signup-button') }}</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <div class="nav-container">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('assets/img/svg/homeBack.svg')}}" class="nav-link" alt="Return">
                        </a>
                    </div>
                    <h1>{{ __('auth.welcome-login') }}</h1>
                    <p>{{ __('auth.welcome-sub-login') }}</p>
                    <button class="ghost" id="signUp">{{ __('auth.welcome-sub-login-button') }}</button>
                </div>
            </div>
        </div>

    @push('guestScripts')
        <script>
            const passwordRequirements = {
                minLength: "{{ __('validation.custom.password_create.minjs') }}",
                number: "{{ __('validation.custom.password_create.number') }}",
                lowercase: "{{ __('validation.custom.password_create.lowercase') }}",
                special: "{{ __('validation.custom.password_create.special') }}",
                uppercase: "{{ __('validation.custom.password_create.uppercase') }}"
            };
        </script>
        <script src="{{asset('assets/js/passwordChecker.js')}}"></script>
        <script>
            const signUpButton = document.getElementById('signUp');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');
            const sign_in = document.getElementById('sign-in');

            signUpButton.addEventListener('click', () => {
                container.classList.add("right-panel-active");
                setTimeout(() => {
                    sign_in.classList.add("hidden");
                }, 400);               
            });

            signInButton.addEventListener('click', () => {
                container.classList.remove("right-panel-active");
                sign_in.classList.remove("hidden");
            });
            // Si hay errores de validación, mostrar el formulario de registro
            @if ($errors->has('name_create') || $errors->has('lastname') || $errors->has('email_create') || $errors->has('password_create') || $errors->has('password_create_confirmation'))
                container.classList.add("right-panel-active");
            @endif
            @if (session('register'))
                container.classList.add("right-panel-active");
            @endif
        </script>
    @endpush
</x-guest-layout>
