<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePosRegisterRequest extends FormRequest
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
            'country' => ['required', 'string', 'max:255'], 
            'state' => ['required', 'string', 'max:255'], 
            'city' => ['required', 'string', 'max:255'], 
            'country_born' => ['required', 'string', 'max:255'], 
            'date_born' => ['required','date_format:d-m-Y'],
            'address' => ['required', 'string', 'max:500'],
            'address_complement' => ['nullable', 'string', 'max:500'],            
        ];

    }
}