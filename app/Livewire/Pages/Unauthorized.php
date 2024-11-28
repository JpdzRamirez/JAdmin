<?php

namespace App\Livewire\Pages;

use App\Http\Requests\StorePosRegisterRequest;

use App\Contracts\UserRepositoryInterface;
use App\Contracts\CastServiceInterface;

use Illuminate\Validation\ValidationException;

use Exception;

use Illuminate\Support\Facades\Auth;

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
    public $date_born;
    protected $userRepository;
    protected CastServiceInterface $castService;

    protected $listeners = [
        "bindingLocation"=> "updateLocation",
        "bindingCountryBorn"=> "updateCountryBorn",
        "bindingDateBorn"=>"updateDateBorn",
    ];
    /* 💓 
    *************************************************
    -------------------Life Hooks--------------
    *************************************************
    */
    public function mount(UserRepositoryInterface $userRepository, CastServiceInterface $castService){
        $this->userRepository = $userRepository;
        $this->castService = $castService;
    }

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
    public function save(UserRepositoryInterface $userRepository,CastServiceInterface $castService)
    {   
        try {

        // Obtener el ID del usuario autenticado
        $userId = Auth::user()->id;
        // Inicializamos inyección de dependencias
        $this->castService = $castService;
        $this->userRepository=$userRepository;
        // Ejecutar las reglas de validación desde StorePosRegisterRequest
        $validatedData = $this->validate();

        if($this->photo){
            $validatedData['image_base64'] = $this->photo;
        }
        // Casteo de fecha
        $validatedData['date_born']=$this->castService->formatDate($validatedData['date_born'],'d-m-y');
        
        // Usar la interfaz de el repositorio para actualizar campos
        $this->userRepository->update($userId, $validatedData);

        sleep(2); // Proceso simulado
        
        $this->dispatch('processCompleted', 'success');

        session()->flash('success', __('forms.register.pos-register-success'));
         
        } catch (ValidationException $exception) {
            // Captura errores de validación y los maneja según sea necesario              
            // Usa addError para manejar los errores de validación de forma reactiva
            foreach ($exception->errors() as $field => $messages) {
                $this->addError($field, $messages[0]); // Primer mensaje de error para cada campo
            }
            $this->dispatch('processCompleted', 'error');
        } catch (Exception $exception) {
            // Capturar otros errores (como el fallo en el repositorio)
            session()->flash('error', __('forms.submit-error-500'));
            $this->dispatch('processCompleted', 'error');
        }
    }
    /* 🧑‍🦰Profile Photo
    *************************************************
    ---------------Events Update---------------------
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
    public function updateDateBorn($date)
    {
        $this->date_born = $date;
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
