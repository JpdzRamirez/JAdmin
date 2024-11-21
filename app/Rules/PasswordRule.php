<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string = null): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
                // Verifica si tiene al menos una letra minúscula
                if (!preg_match('/[a-z]/', $value)) {
                    $fail('El campo :attribute debe contener al menos una letra minúscula.');
                    return; // Salir después de fallar
                }
        
                // Verifica si tiene al menos una letra mayúscula
                if (!preg_match('/[A-Z]/', $value)) {
                    $fail('El campo :attribute debe contener al menos una letra mayúscula.');
                    return;
                }
        
                // Verifica si tiene al menos un número
                if (!preg_match('/[0-9]/', $value)) {
                    $fail('El campo :attribute debe contener al menos un número.');
                    return;
                }
                
                // Verifica si tiene al menos un carácter especial
                if (!preg_match('/[\W_]/', $value)) { // \W coincide con cualquier carácter que no sea alfanumérico
                    $fail('El campo :attribute debe contener al menos un carácter especial.');
                    return;
                }
    }
}
