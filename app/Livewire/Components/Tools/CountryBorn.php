<?php

namespace App\Livewire\Components\Tools;

use Livewire\Component;

class CountryBorn extends Component
{   
    public $customCountryBornId;

    public $selectedCountryBorn;
    public $countryBorn;

    protected $listeners=['selectorCountryBornCharger'];

    public function mount($customCountryBornId = "countryBornComponent")
    {
        $this->customCountryBornId = $customCountryBornId;
    }

    public function selectorCountryBornCharger(string $optionSelected)
    {
        $this->selectedCountryBorn = $optionSelected;
        $this->dispatch('bindingCountryBorn', $optionSelected);
    }
    public function render()
    {
        return view('livewire.components.tools.country-born');
    }
}
