<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Unauthorized extends Component
{   
    public $country;
    public $state;
    public $city;
    
    protected $listeners = [
        "countryBinding"=> "updateCountry",
        "stateBinding"=> "updateState",
        "cityBinding"=> "updateCity",
    ];
    public function render()
    {
        return view('livewire.pages.unauthorized');
    }
}
