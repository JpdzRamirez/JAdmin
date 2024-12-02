<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileUserRequest extends FormRequest
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
        //Reglas de validación para actualización de datos pos-registro
        return [            
            'study' => ['nullable','string','max:255'],
            'description' => ['required','string','max:500'],
            'card' => ['required','string','max:20'],
            'company_id' => ['nullable','string','max:20'],
            'country' => ['required', 'string', 'max:255'], 
            'state' => ['required', 'string', 'max:255'], 
            'city' => ['required', 'string', 'max:255'], 
            'country_born' => ['required', 'string', 'max:255'], 
            'date_born' => ['required','date_format:Y-m-d'],
            'address' => ['required', 'string', 'max:500'],
            'address_complement' => ['nullable', 'string', 'max:500'],            
        ];

    }
}