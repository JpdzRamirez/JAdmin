<?php

namespace App\Livewire\Pages;

use App\Http\Requests\StorePosRegisterRequest;

use App\Contracts\CastServiceInterface;

use Livewire\Component;

use Livewire\WithFileUploads;

class Unauthorized extends Component
{   
    use WithFileUploads;
    public $photo;
    public $country;
    public $state;
    public $city;
    public $country_born;
    public $address;
    public $address_complement;
    public $dateborn;

    protected $listeners = [
        "bindingLocation"=> "updateLocation",
        "bindingCountryBorn"=> "updateCountryBorn",
    ];
    protected CastServiceInterface $castService;
    /* 📏📐
    *************************************************
    -------------------Validation Rules--------------
    *************************************************
    */
    protected function rules()
    {
        return (new StorePosRegisterRequest)->rules();
    }
    /* 🎛️🤖
    *************************************************
    -------------------Functions---------------------
    *************************************************
    */
    public function save()
    {
        // Ejecutar las reglas de validación desde StorePosRegisterRequest
        $validatedData = $this->validate();
 
        session()->flash('status', 'Post successfully updated.');
 
        return $this->redirect('/posts');
    }
    /* 🧑‍🦰Profile Photo
    *************************************************
    ---------------Events binding---------------------
    **************************************************
    */
    public function updatedPhoto(CastServiceInterface $castService){
        //Inicializar Instancia
        $this->castService = $castService;
        $tempPhoto=$this->photo;
        $this->photo =$this->castService->processPhoto($tempPhoto);
    }
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
    public function updateCountryBorn($optionSelected)
    {
        $this->country_born = $optionSelected;
    }
    public function render()
    {
        return view('livewire.pages.unauthorized');
    }
}
