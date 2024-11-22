<?php

namespace App\Actions\Fortify;

use App\Models\User;


use App\Contracts\UserRepositoryInterface;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Laravel\Fortify\Contracts\CreatesNewUsers;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    protected $userRepository;

    /**
     * Constructor para inyectar el repositorio de usuarios.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
     /**
     * Validate and create a newly registered user.
     *
     * @param array<string, string> $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        $rules = (new StoreUserRequest())->rules();

        // Valida los datos
        $validatedData = Validator::make($input, $rules)->validate();

        // Crear el usuario a través del repositorio
        return $this->userRepository->create([
            'name' => $validatedData['name_create'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email_create'],
            'password' => Hash::make($validatedData['password_create']),
        ]);
    }
}
