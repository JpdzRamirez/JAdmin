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
            <div class="card card-form">
                <div class="card-header">
                    <div class="card-title">{{ __('navigation.pos-register.title') }}</div>
                    <h2 style="text-align: center">{!! __('navigation.pos-register.sub-title', ['name' => Auth::user()->name]) !!}</h2>
                    <div class="card-category">
                        <span>{{ __('navigation.pos-register.span') }}</span>
                    </div>
                    <div class="row mb-3">
                        <div class="alert alert-danger">
                            <ul>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                @elseif (session('success'))
                                    <li>{{ session('success') }}</li>
                                @endif
        
                            </ul>
                        </div>
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
                    <form action="" method="post">
                      @csrf
                      <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="phone" class="mb-0 label-required">Foto de Perfil:</label>
                        </div>
                        <div class="col-sm-9 text-secondary d-flex align-items-center flex-column">
                            <div class="avatar avatar-xxl">
                                @if ($photo instanceof \Livewire\TemporaryUploadedFile)
                                    <img id="profile-photo" class="avatar-img rounded-circle"
                                        src="{{ $photo->temporaryUrl() }}" />
                                @elseif ($photo)
                                    <img id="profile-photo" class="avatar-img rounded-circle"
                                        src="{{ $photo }}" />
                                @else
                                <img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                                @endif                                
                            </div>
                                <input id="photo"
                                class="form-control-file"
                                wire:model="photo" name="photo" type="file"
                                accept=".jpg,.jpeg,.png" />
                        </div>
                      </div>

                        <div class="row mb-3">
                          <div class="col-sm-3">
                              <label for="phone" class="mb-0 label-required">{{ __('forms.register.location') }}:</label>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            <livewire:components.tools.location-selector :selectedCountry="$country"
                            :initState="$state" :initCity="$city" />
                          </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label for="countryBorn" class="mb-0 label-required">{{ __('forms.register.location-born') }}:</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <livewire:components.tools.country-born :selectedCountryBorn="$country_born"/>
                            </div>
                          </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label class="mb-3 form-label label-required" id="labelStartDateSingle"
                                    for="born_date">{{ __('forms.register.date-born') }}</label>
                            </div>
                            <div class="col-sm-9 container-datePicker input-group date" style="width: inherit" id="dateSingleInput">
                                    <input type="text" name="born_date" id="born_date" class="form-control" placeholder=""
                                        value="">
                                    <div class="input-group-addon input-group-text">
                                        <span class="glyphicon glyphicon-th"></span>
                                        <span class="fa fa-calendar" id="fa-1"></span>
                                    </div> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label for="address" class="mb-0 label-required">{{ __('forms.register.address') }}:</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea type="text" rows="1" class="form-control" id="address" 
                                    value=""></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label for="address_complement" class="mb-0 label-required">{{ __('forms.register.address_complement') }}:</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea type="text" rows="1" class="form-control" id="address_complement" 
                                    value=""></textarea>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            {{-- Si está autenticado, verificado mail, con pos-registro y pendiente de asignación de rol --}}
        </div>
    </div>
    
</div>
@push('dashboardScripts')
<script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
