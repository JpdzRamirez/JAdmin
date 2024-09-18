<?php

namespace App\Livewire\Components\Head;

use Livewire\Component;


class Online extends Component
{

    public $statusMessage;
    public $color;

    protected $listeners = [
        'userInactive' => 'handleUserInactive',
        'userActive' => 'handleUserActive',
        'userAway' => 'handleUserAway',
    ];

    public function mount()
    {
        $this->statusMessage = 'Active';
        $this->color = 'green';
    }
    public function handleUserInactive()
    {
        $this->statusMessage = 'Inactive';
        $this->color = '#ff4d4d';
        
    }

    public function handleUserActive()
    {
        $this->statusMessage = 'Active';
        $this->color = 'green';
    }

    public function handleUserAway()
    {
        $this->statusMessage = 'Away';
        $this->color = '#f2c94c';
    }

    
    public function render()
    {
        return view('livewire.components.head.online',[
            'statusMessage'=> $this->statusMessage,
        ]);
    }
}
