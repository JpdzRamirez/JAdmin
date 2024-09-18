<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

use function Livewire\Volt\state;

class Profile extends Component
{

    public $name;
    public $email;

    // Inicialización de las variables al montar el componente
    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function handleProfileUpdateInformation()
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('userProfileUpdated', $user->name, $user->email);

        $this->dispatch('profile-updated', name: $user->name);
    }

    public function handleVerification()
    {
        $sendVerification = function () {
            $user = Auth::user();
        
            if ($user->hasVerifiedEmail()) {
                $this->redirectIntended(default: route('dashboard', absolute: false));
        
                return;
            }
        
            $user->sendEmailVerificationNotification();
        
            Session::flash('status', 'verification-link-sent');
        };
    }
    public function render()
    {
        return view('livewire.pages.profile');
    }
}
