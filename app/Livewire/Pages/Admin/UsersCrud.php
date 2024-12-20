<?php

namespace App\Livewire\Pages\Admin;

use App\Contracts\UserRepositoryInterface;

use Livewire\Component;

class UsersCrud extends Component
{   
    public $users;
    public function mount(UserRepositoryInterface $userRepository){
        //Obtiene todos los usuarios
        $this->users = $userRepository->all();
    }
    public function deleteUser($id){
        //Elimina un usuario
        $this->userRepository->delete($id);
        //Recarga la vista
        $this->mount($this->userRepository);
    }
    public function render()
    {
        return view('livewire.pages.admin.users-crud');
    }
}
