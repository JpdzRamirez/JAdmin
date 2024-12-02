<?php

namespace App\Livewire\Pages\Profile;

use App\Http\Requests\UpdateProfileUserRequest;

use App\Contracts\UserRepositoryInterface;
use App\Contracts\CastServiceInterface;
use App\Contracts\Complementary_DataRepositoryInterface;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Exception;

use Livewire\Component;


use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;

class ProfileUser extends Component
{
    use WithFileUploads;
    
    public $userID; 
    public $user;
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

        /* 📏📐
    *************************************************
    -------------------Validation Rules--------------
    *************************************************
    */
    protected function rules()
    {
        return (new UpdateProfileUserRequest)->rules();
    }
    public function mount($userID = null,UserRepositoryInterface $userRepository,
    CastServiceInterface $castService,
    Complementary_DataRepositoryInterface $complementary_DataRepository)
    {
       // Inicializamos instancias y cargamos el usuario       
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
       if($userID){
        try {
            // Recuperamos el usuario
            $this->user=$this->userRepository->find(Auth::user()->id);

            if($this->user){
                    // Cargamos los datos de las variables
                    foreach ($this->user->getAttributes() as $key => $value) {
                        if (property_exists($this, $key)) {
                            $this->{$key} = $value;
                        }
                    }   
                    // Cargamos la foto 
                    $this->photo=$this->user->image_base64;
                    // Cargamos la data de la relación  
                    $this->loadComplementaryData();            
            }
            } catch (ModelNotFoundException $e) {
                    // Manejo si no se encuentra la presentación
                    throw new ModelNotFoundException(" ID Busqueda: $userID" . " " . __('exceptions.not-found'));
            }
       }
   }

   /* 🎛️🤖
    *************************************************
    -------------------Functions---------------------
    *************************************************
    */
    
    protected function loadComplementaryData()
    {
        if ($this->user->relationLoaded('complementary_data') && $this->user->complementary_data) {
            $this->study = $this->user->complementary_data->study ?? null;
            $this->card = $this->user->complementary_data->card ?? null;
            $this->company_id = $this->user->complementary_data->company_id ?? null;
        }
    }
    public function save(
        UserRepositoryInterface $userRepository,
        CastServiceInterface $castService,
        Complementary_DataRepositoryInterface $complementary_DataRepository)
    {   
    try {

        // Obtener el ID del usuario autenticado
        $userId = $this->user->id;
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
        $validatedData['date_born']=$this->castService->formatDate($validatedData['date_born'],'y-m-d');
        // Actualizamos estado de pos-registro
        $validatedData['pos_register']=$this->pos_register;

        // Usar la interfaz de el repositorio para actualizar campos
        $this->userRepository->update($userId, $validatedData);

        // Crear el array con los datos complementarios
        $data = [
            'study' => $this->study,
            'card' => $this->card,
            'company_id' => $this->company_id,                        
        ];
        // Cargar la información complementaria
        $this->complementary_DataRepository->update($userId,$data);
        
        $this->dispatch('processCompleted', 'success');
        $this->dispatch('userProfileUpdated')->to('components.head.dropdown-profile');

        // Proceso simulado        
        sleep(2); 

        // Asegúrate de que los datos estén sincronizados        
        
        session()->flash('success', __('forms.profile-success'));
         
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
        return view('livewire.pages.profile.profile-user');
    }
}
