<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Jetstream\Jetstream;
use App\Rules\PasswordRule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
        //Reglas de validación para cración de un perfil Presentation
        return [
            'name_create' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'], // Letras y espacios
            'lastname' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'], // Letras y espacios
            'email_create' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], // Email único
            'password_create' => [
                'required',
                'string',
                'min:8', // mínimo de 8 caracteres
                new PasswordRule(),
                'confirmed', // debe coincidir con el campo de confirmación
            ],
            'phone' => ['required', 'string', 'regex:/^[0-9]+$/', 'min:10', 'max:50'],
            'password_create_confirmation' => ['required', 'same:password_create'], // Confirmación de contraseña
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '', // Aceptación de términos
        ];

    }
}