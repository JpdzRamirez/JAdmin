<?php

namespace App\Livewire\Components\Tools;

use App\Contracts\CountryServiceInterface;

use App\Services\GeoLocationHandler;

use Illuminate\Support\Facades\App;

use Livewire\Component;

class CountryBorn extends Component
{   
    
    public $customLocationId;
    public $countries = [];

    public $selectedCountry;

    protected CountryServiceInterface $countryService;

    public function mount(CountryServiceInterface $countryService, $customLocationId = "countryComponent")
    {
        $this->countryService = $countryService;
        $this->customLocationId = $customLocationId;
        $this->fetchCountries();
    }
    public function render()
    {
        return view('livewire.components.tools.country-born');
    }
}
