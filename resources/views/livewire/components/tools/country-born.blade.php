<div id="{{ $customCountryBornId }}" wire:id="{{ $customCountryBornId }}">
  <div class="row mb-3">
      <div class="col-md-4" id="inputGroupCoutryBorn">
        <label for="countryBorn" id="labelPhone" class="form-label label-required">{{ __('forms.register.label-country-born') }}:</label>
        <select class="input-group-text form-select" id="countryBornSelector"></select>
      </div>
  </div>
</div>
@push('dashboardScripts')
<script src="{{ asset('assets/js/locationSelector/selectorCountryBorn.js') }}"></script>
  <script>
      const countryBornComponent = document.getElementById("countryBornComponent");
      const wireCountryBornId = countryBornComponent.getAttribute('wire:id');
      

      let countryBornDispatched = false;
      let selectedCountryBorn = @json($selectedCountryBorn);
      // Inicializar seletores
      let previousSelectedCountryBorn = selectedCountryBorn;
      // Funciones para cargar el select personalizado
      function initializeCountryBornSelect(selectedCountryBorn, selectorCountryBorn, countriesBornData, spanLang) {
          new countryBornSelector('#countryBornSelector', {
              columns: 3,
              width: '100%',
              dropdownWidth: '100%',
              placeholder: "--{{ __('forms.register.select-country') }}--",
              data: countriesBornData.map(function(country) {
                  return {
                    value: country.name,
                    img: country.flag,
                    imgWidth: '50px',
                    imgHeight: '30px',
                    text: country.name,
                  };
              }),
          }, selectedCountryBorn, selectorCountryBorn, spanLang);
      }
      //Consumo de API para listar telefono internacional
      document.addEventListener('livewire:initialized', () => {
          setTimeout(() => {
              // Volver a inicializar el select con los datos
              initializeCountryBornSelect(selectedCountryBorn, 'countryBornSelector', countriesData, spanLanguage);
          }, 500);            
      });
      let isCountryBornUpdating = false;
      // También escucha el evento livewire:updated
      Livewire.hook('morph.updated', ({
          component
      }) => {
          //Si el componente es el selector de países
          if (component.id == wireCountryBornId) {
              if (isCountryBornUpdating) return; // Si ya está actualizando, salir
              let livewireCountryBornComponent = Livewire.find(wireCountryBornId);                
              isCountryBornUpdating = true;
              loadingSpinner.classList.add('hidden');
              $(".card-form").removeClass('overlay-card');

              let newSelectedCountryBorn = livewireCountryBornComponent.get('selectedCountryBorn');
              //solo se ejecuta en caso de un dispatch number
              if (countryBornDispatched) {
                  // Volver a inicializar el select con los datos
                  countryBornDispatched = false;
                  setTimeout(() => {
                      // Volver a inicializar el select con los datos
                      initializeCountryBornSelect(newSelectedCountryBorn, 'countryBornSelector', countriesData,
                          spanLanguage);
                          isCountryBornUpdating = false;
                  }, 200);
              }
              // Solo ejecutar si los valores han cambiado
              if (newSelectedCountryBorn !== previousSelectedCountryBorn) {
                previousSelectedCountryBorn = newSelectedCountryBorn;
                  setTimeout(() => {
                      // Volver a inicializar el select con los datos
                      initializeCountryBornSelect(newSelectedCountryBorn, 'countryBornSelector', countriesData,
                          spanLanguage);
                          isCountryBornUpdating = false; // Reiniciar flag una vez completada la actualización
                  }, 500);
              } else {
                isCountryBornUpdating = false; // Reiniciar flag si no hay cambios
              }
          }
      });
  </script>
@endpush