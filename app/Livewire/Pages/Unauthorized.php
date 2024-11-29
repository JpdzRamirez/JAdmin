<?php

namespace App\Livewire\Pages;

use App\Http\Requests\StorePosRegisterRequest;

use App\Contracts\UserRepositoryInterface;
use App\Contracts\CastServiceInterface;
use App\Contracts\Complementary_DataRepositoryInterface;

use Illuminate\Validation\ValidationException;

use Exception;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

use Livewire\WithFileUploads;

class Unauthorized extends Component
{   
    use WithFileUploads;
    public $pos_register=1;
    public $study;
    public $study_options=[];
    public $card;
    public $company_id;
    public $photo;
    public $description;
    public $country;
    public $state;
    public $city;
    public $country_born;
    public $address;
    public $address_complement;
    public $date_born;
    protected UserRepositoryInterface $userRepository;
    protected CastServiceInterface $castService;
    protected Complementary_DataRepositoryInterface $complementary_DataRepository;

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
    public function mount(UserRepositoryInterface $userRepository,
     CastServiceInterface $castService,
     Complementary_DataRepositoryInterface $complementary_DataRepository)
     {
        $this->userRepository = $userRepository;
        $this->castService = $castService;
        $this->complementary_DataRepository=$complementary_DataRepository;
        // Carga las opciones desde el archivo de idioma
        $this->study_options = [
            'option-one' => __('forms.register.study.option-one'),
            'option-two' => __('forms.register.study.option-two'),
            'option-three' => __('forms.register.study.option-three'),
            'option-four' => __('forms.register.study.option-four'),
        ];
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
    public function save(
        UserRepositoryInterface $userRepository,
        CastServiceInterface $castService,
        Complementary_DataRepositoryInterface $complementary_DataRepository)
    {   
        try {

        // Obtener el ID del usuario autenticado
        $userId = Auth::user()->id;
        // Inicializamos inyección de dependencias
        $this->castService = $castService;
        $this->userRepository=$userRepository;
        $this->complementary_DataRepository=$complementary_DataRepository;
        // Ejecutar las reglas de validación desde StorePosRegisterRequest
        $validatedData = $this->validate();

        if($this->photo){
            $validatedData['image_base64'] = $this->photo;
        }

        // Casteo de fecha
        $validatedData['date_born']=$this->castService->formatDate($validatedData['date_born'],'d-m-y');
        // Actualizamos estado de pos-registro
        $validatedData['pos_register']=$this->pos_register;

        // Usar la interfaz de el repositorio para actualizar campos
        $this->userRepository->update($userId, $validatedData);

        // Crear el array con los datos complementarios
        $data = [
            'study' => $this->study,
            'card' => $this->card,
            'company_id' => $this->company_id,            
            'user_id' => $userId,
        ];
        // Cargar la información complementaria
        $this->complementary_DataRepository->create($data);
        
        $this->dispatch('processCompleted', 'success');
        $this->dispatch('userProfileUpdated')->to('components.head.dropdownprofile');

        // Proceso simulado        
        sleep(2); 

        // Asegúrate de que los datos estén sincronizados
        Auth::user()->refresh();
        
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
