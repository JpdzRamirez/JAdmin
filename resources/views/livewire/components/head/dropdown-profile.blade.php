<div>
    
    <li class="nav-item topbar-user dropdown hidden-caret">
        <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
            <div class="avatar-sm">
                @if ($user->image_base64 == null)
                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="Profile Photo" class="avatar-img rounded-circle" />                    
                @else
                    <img src="{{$user->image_base64}}" alt="Profile Photo" class="avatar-img rounded-circle" />
                @endif
            </div>
            <span class="profile-username">
                <span class="op-7">{{ __('general.welcome') }},</span>                
                <span class="fw-bold">{{ $user->name . ' '. $user->lastname}}</span>
            </span>
        </a>
        <ul class="dropdown-menu dropdown-user animated fadeIn">
            <div class="dropdown-user-scroll scrollbar-outer">
                <li>
                    <div class="user-box">
                        <div class="avatar-lg">
                            @if ($user->image_base64 == null)
                                <img src="{{ asset('assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded" />
                            @else
                                <img src="{{ $user->image_base64 }}" alt="image profile" class="avatar-img rounded" />
                            @endif                            
                        </div>
                        <div class="u-text">
                            <h4>{{ $user->roles->name }}</h4>
                            <p class="text-muted">{{ $user->email }}</p>
                            <a href="#"
                                class="btn btn-xs btn-secondary btn-sm">{{ __('auth.profile') }}</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">My Balance</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="fas fa-key"
                            style="margin-right: 1em;"></i>{{ __('passwords.change') }}</a>
                    @if ( $user->role == 1)
                        <a class="dropdown-item" href="#"><i class="fa-solid fa-users" style="margin-right: 1em;"></i>{{ __('auth.users') }}</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a wire:click="logout" class="dropdown-item"><i class="fas fa-power-off"
                            style="margin-right: 1em;"></i>{{ __('auth.logout') }}</a>
                </li>
            </div>
        </ul>
    </li>
</div>
