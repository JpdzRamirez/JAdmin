<div id="{{ $customLocationId }}" wire:id="{{ $customLocationId }}">
    <div class="row mb-3">
        <div class="col-md-4" id="inputGroupCountryBorn">
          <label for="selectedCountryBorn" id="labelCountry" class="form-label ">{{__('forms.register.label-country')}}</label>
          <select class="form-select" id="selectedCountryBorn" name="countryBorn"></select>
        </div>
      </div>
</div>
@push('dashboardScripts')
<script>  
  // Variables constantes
  let initializedBorn = false;
  const locationComponent = document.getElementById("countryComponent");
  const wireLoctaionId = locationComponent.getAttribute('wire:id');
  const spanLanguage = "{{ __('forms.register.select-PlaceHolder')}}";

  //Variables del controlador
  let countriesData = @json($countries);
 
  let selectedCountry = @json($selectedCountry);

  // Inicializar seletores
  let previousSelectedCountry = selectedCountry;


  // Funciones para cargar el select personalizado
  function initializeCountrySelect(selectedCountry,selectorCountry,spanLang) {
    new DynamicSelect('#selectedCountry', {
        columns: 3,
        width: '100%',
        dropdownWidth: '100%',
        placeholder: "--{{ __('forms.register.select-country')}}--",
        data: countriesData.map(function(country) {
            return {
                value: country.name,
                img: country.flag,
                imgWidth: '50px',
                imgHeight: '30px',
                text: country.name,
            };
        }),
    }, selectedCountry,selectorCountry,spanLang);
  }

  //***************************************

  //Consumo de API para listar paises
  document.addEventListener('livewire:initialized', () => {
        initializeCountrySelect(selectedCountry,"selectedCountryBorn",spanLanguage);
    })

  let isLocationUpdating = false;
  // También escucha el evento livewire:updated
  Livewire.hook('morph.updated', ({component})=> {
    //Si el componente es el selector de países
    if(component.id==wireLoctaionId){      
        let livewireLocationComponent = Livewire.find(wireLoctaionId);
        if (isLocationUpdating) return;  // Si ya está actualizando, salir

        isLocationUpdating = true;
        loadingSpinner.classList.add('hidden');             
        $(".card-form").removeClass('overlay-card'); 
        
        let newSelectedCountry = livewireLocationComponent.get('selectedCountry');

        // Solo ejecutar si los valores han cambiado
        if (newSelectedCountry !== previousSelectedCountry) {

            previousSelectedCountry = newSelectedCountry;

            setTimeout(() => {
                // Volver a inicializar los selects con los datos actualizados
                initializeCountrySelect(newSelectedCountry, "selectedCountryBorn",spanLanguage);         
                isLocationUpdating = false;  // Reiniciar flag una vez completada la actualización
            }, 500);
        } else {
          isLocationUpdating = false;  // Reiniciar flag si no hay cambios
        } 
    }
})
</script>
@endpush