<?php

namespace App\Livewire\Components\Head;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class DropdownProfile extends Component
{
    public $user;
    protected $listeners = [
        'userProfileUpdated' => 'updateDropdownInfo'
    ];

    // Inicialización de las variables al montar el componente
    public function mount()
    {
        $this->user = Auth::user();
    }
    public function logout()
    {
        Auth::guard('web')->logout(); // Cierra la sesión del usuario

        request()->session()->invalidate(); // Invalida la sesión actual
        request()->session()->regenerateToken(); // Regenera el token CSRF para seguridad
    
        return redirect('/'); // Redirecciona al usuario a la página de inicio
    }
    public function updateDropdownInfo()
    {
        $this->user=Auth::user()->refresh();
    }
    public function render()
    {
        return view('livewire.components.head.dropdown-profile', [
            'user' => $this->user,
        ]);
    }
}
