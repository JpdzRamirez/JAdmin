<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Unauthorized extends Component
{   
    public $country;
    public $state;
    public $city;
    
    protected $listeners = [
        "bindingLocation"=> "updateLocation",
    ];
    /* 🔛🔙✔️
    *************************************************
    ---------------Events binding---------------------
    **************************************************
    */
    public function updateLocation($data)
    {
        $this->country = $data['country'];
        $this->state = $data['state'];
        $this->city = $data['city'];
    }
    public function render()
    {
        return view('livewire.pages.unauthorized');
    }
}
