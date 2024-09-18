<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Admin extends Component
{

    public $titulo;

    public function mount($titulo = "Bienvenido")
    {
        if (Auth::check()) {
            // Usuario está autenticado
            Session::flash('status', 'logged-in');
        } else {
            // Usuario no está autenticado
            Session::flash('status', 'not-logged-in');
        }
        //Se setea un cookie para no volver a mostrar el modal de bienvenida   
        $cookieName = 'modal_shown';

        // Verifica si la cookie ya está establecida
        if (!Cookie::has($cookieName)) {
            $this->titulo = $titulo ?? '';
            // Establece la cookie para que expire en 24 horas
            Cookie::queue($cookieName, 'true', 1440); // 1440 minutos = 24 horas
        } else {
            $this->titulo = 'Estadisticas';
        }
    }

    public function changeTitle($titulo)
    {
        $validTitles = ['AutoVale', 'Sanitizer', 'Bienvenido'];

        if (in_array($titulo, $validTitles)) {
            $this->titulo = $titulo;
        } else {
            $this->titulo = 'notFound';
        }

        $this->dispatch('titleChanged', $titulo); // Emitir el evento
    }

    // Método para cerrar sesión


    public function render()
    {
        return view('livewire.pages.admin', [
            'titulo' => $this->titulo,
        ]);
    }
}
