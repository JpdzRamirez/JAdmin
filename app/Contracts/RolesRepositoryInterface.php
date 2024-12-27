<?php

namespace App\Contracts;
/**
 * The Builder interface specifies methods for creating the different parts of
 * the Product objects.
 */

interface RolesRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}