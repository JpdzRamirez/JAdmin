<div>
    {{-- Navigation zone⛵ --}}
    <div class="page-header">
        <h3 class="fw-bold mb-3">{{ __('navigation.nav-form') }}</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('home') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">{{ __('navigation.nav-profile') }}</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('pos-register.dashboard') }}">{{ __('navigation.pos-register.section') }}</a>
            </li>
        </ul>
    </div>
    {{-- Si está autenticado, verificado mail, sin pos-registro --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ __('navigation.pos-register.title') }}</div>
                    <h2 style="text-align: center">{!! __('navigation.pos-register.sub-title', ['name' => Auth::user()->name]) !!}</h2>
                    <div class="card-category">
                        <span>{{ __('navigation.pos-register.span') }}</span>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Name --}}
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="name" class="mb-0 label-required">{{ __('forms.register.name') }}:</label>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="name" readonly
                                value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    {{-- Last Name --}}
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="lastname"
                                class="mb-0 label-required">{{ __('forms.register.lastname') }}:</label>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="lastname" readonly
                                value="{{ Auth::user()->lastname }}">
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="email" class="mb-0 label-required">{{ __('forms.register.email') }}:</label>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="email" readonly
                                value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    {{-- Phone --}}
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="phone" class="mb-0 label-required">{{ __('forms.register.phone') }}:</label>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="number" class="form-control" id="phone" readonly
                                value="{{ Auth::user()->phone }}">
                        </div>
                    </div>
                    <hr>
                    {{-- FORM New Inputs --}}
                    <form action="{{ route('user.update') }}" method="post">
                      @csrf
                        <div class="row mb-3">
                          <div class="col-sm-3">
                              <label for="phone" class="mb-0 label-required">{{ __('forms.register.country') }}:</label>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            
                          </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    {{-- Si está autenticado, verificado mail, con pos-registro y pendiente de asignación de rol --}}
</div>
