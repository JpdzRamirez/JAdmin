<div>
    <li class="nav-item topbar-user dropdown hidden-caret">
        <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
            <div class="avatar-sm">
                <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle" />
            </div>
            <span class="profile-username">
                <span class="op-7">{{ __('general.welcome') }},</span>
                <span class="fw-bold">{{ $name }}</span>
            </span>
        </a>
        <ul class="dropdown-menu dropdown-user animated fadeIn">
            <div class="dropdown-user-scroll scrollbar-outer">
                <li>
                    <div class="user-box">
                        <div class="avatar-lg">
                            <img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded" />
                        </div>
                        <div class="u-text">
                            <h4>{{ $rol }}</h4>
                            <p class="text-muted">{{ $email }}</p>
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
                    @if (auth()->user()->rol == 1)
                        <a class="dropdown-item" href="#"><i class="fa-solid fa-users"
                                style="margin-right: 1em;"></i>{{ __('auth.users') }}</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a wire:click="logout" class="dropdown-item"><i class="fas fa-power-off"
                            style="margin-right: 1em;"></i>{{ __('auth.logout') }}</a>
                </li>
            </div>
        </ul>
    </li>
</div>
