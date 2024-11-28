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
                    {{-- Display Errors --}}
                    <div class="row mb-3">
                        @if ($errors->any())                        
                        <div class="alert alert-danger shake-horizontal">
                            <ul>                                
                                @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach                                                               
                            </ul>
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success">
                            <ul> 
                                <li>{{ session('success') }}</li>   
                            </ul>    
                        </div>                                
                        @endif
                        @if (session('error'))
                        <div class="alert alert-warning">
                            <ul> 
                                <li>{{ session('error') }}</li>   
                            </ul>    
                        </div>                                
                        @endif
                    </div>  
                    {{-- FORM New Inputs --}}                    
                    <form wire:submit.prevent="save">                  
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
                        <hr>
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
                                    for="date_born">{{ __('forms.register.date-born') }}</label>
                            </div>
                            <div class="col-sm-9 container-datePicker input-group date" style="width: inherit" id="dateSingleInput">
                                    <input type="text" name="date_born" id="date_born" class="form-control" placeholder=""
                                         wire:model="date_born">
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
                                <textarea type="text" rows="1" class="form-control" id="address" wire:model="address"
                                    value=""></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label for="address_complement" class="mb-0 label-required">{{ __('forms.register.address_complement') }}:</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea type="text" rows="1" class="form-control" id="address_complement"  wire:model="address_complement"
                                    value=""></textarea>
                            </div>
                        </div>
                        <div class="card-action d-flex justify-content-center">
                            <div x-data="{
                                updating: false,
                                success: false,
                                error: false,
                                startProcess() {                                
                                    this.updating = true;
                                    this.success = false;
                                    this.error = false;
                                    // Inicia el proceso de Livewire
                                    @this.call('save');
                                },
                                restoreButton() {
                                    this.updating = false;
                                    this.success = false;
                                    this.error = false;
                                },
                                init() {
                                    // Escuchar el evento 'processCompleted' emitido desde Livewire
                                    @this.on('processCompleted', (status) => {                                    
                                        if (status[0] === 'success') {
                                            this.updating = false;
                                            this.success = true;
                                        } else if (status[0] === 'error') {
                                            this.error = true;
                                            this.updating = false;
                                        }
                                        // Restaurar el estado del botón después de 2 segundos
                                        setTimeout(() => {                                            
                                            this.restoreButton();
                                        }, 3000);
                                    });
                                }
                            }" x-init="init()">
                                <button :class="updating ? 'btn btn-warning' : (success ? 'btn btn-success' : (error ? 'btn btn-danger' : 'btn btn-primary'))"
                                        @click="startProcess">
                                    <span class="btn-label">
                                        <span x-show="updating" x-html="'<i class=\'fa fa-exclamation-circle\'></i> Updating...'"></span>
                                        <span x-show="success" x-html="'<i class=\'fa fa-check\'></i> Success'"></span>
                                        <span x-show="error" x-html="'<i class=\'fa fa-times\'></i> Failed'"></span>
                                        <span x-show="!(updating || success || error)" x-html="'<i class=\'fa fa-archive\'></i> Enviar'"></span>
                                    </span>
                                </button>
                            </div>
                                     
                    </form>
                    </div>
                </div>
            </div>
            {{-- Si está autenticado, verificado mail, con pos-registro y pendiente de asignación de rol --}}
        </div>
    </div>
    
</div>
@push('dashboardScripts')
<script src="{{ asset('assets/js/datepicker.js') }}"></script>
<!-- Añadimos el control Alpine.js -->
<script>

</script>
@endpush
