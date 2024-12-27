<?php

namespace App\Livewire\Pages\Admin;

use App\Contracts\UserRepositoryInterface;
use App\Contracts\RolesRepositoryInterface;

use Livewire\Component;

class UsersCrud extends Component
{   
    public $users;
    public $roles;
    protected $listeners = [
        'updateRole'
    ];
    public function mount(UserRepositoryInterface $userRepository,RolesRepositoryInterface $rolesRepository){
        //Obtiene todos los usuarios
        $this->users = $userRepository->all();
        $this->roles = $rolesRepository->all();
    }

    public function updateRole(UserRepositoryInterface $userRepository, int $userKey, int $newRoleId)
    {
        // Prepara los datos para la actualización
        $data = ['role' => $newRoleId];
        // Actualiza el rol del usuario en la base de datos.
        $user = $userRepository->update($userKey,$data); // Obtén el usuario actual o el que deseas actualizar

        $user->refresh(); // Ahora el rol actualizado estará en la variable $user
        
        // Emitir mensaje de éxito
        $this->dispatch('action-done', ['message' => 'El rol se ha actualizado a '. $user->roles->name]);
    }
    public function deleteUser($id){
        //Elimina un usuario
        $this->userRepository->delete($id);
    }
    public function render()
    {
        return view('livewire.pages.admin.users-crud',
        ['users'=> $this->users]);
    }
}
