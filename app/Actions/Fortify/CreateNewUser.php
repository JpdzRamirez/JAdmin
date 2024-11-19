<?php

namespace App\Actions\Fortify;

use App\Models\User;

use App\Rules\PasswordRule;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name-create' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'], // Letras y espacios
            'lastname' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'], // Letras y espacios
            'email-create' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Email único
            'password-create' => [
                'required',
                'string',
                'min:8', // mínimo de 8 caracteres
                new PasswordRule(),
                'confirmed', // debe coincidir con el campo de confirmación
            ],
            'password_confirmation' => ['required', 'same:password'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name-create'],
            'lastname' => $input['lastname'],
            'email' => $input['email-create'],
            'password' => Hash::make($input['password-create']),
        ]);
    }
}
