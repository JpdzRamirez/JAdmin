<?php

namespace App\Repositories;

use App\Models\Complementary_Data;
use App\Models\User;


use App\Contracts\Complementary_DataRepositoryInterface;

class Complementary_DataRepository implements Complementary_DataRepositoryInterface
{
    protected $model;

    /**
     * A fresh builder instance should contain a blank product object, which is
     * used in further assembly.
     */
    public function __construct(Complementary_Data $model)
    {
        $this->model = $model;
    }
    public function reset(): void
    {
        $this->model = new Complementary_Data();
    }
    /**
     * All production steps work with the same product instance.
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $complementary_data = $this->model->findOrFail($id);
        $complementary_data->update($data);
        return $complementary_data;
    }

    public function delete($id)
    {
        $complementary_data = $this->model->findOrFail($id);
        $complementary_data->delete();
    }

    public function createExperiences(User $user, array $data)
    {
        // Crear las entradas en la tabla complementary_data asociadas al usuario                
        $data['user_id'] = $user->id; // Asociar con el ID de la presentación
        $complementary_data[] = Complementary_Data::create($data); // Guardar cada habilidad creada en el arreglo        
        return $complementary_data; // Retornar todas las habilidades creadas
    }
}