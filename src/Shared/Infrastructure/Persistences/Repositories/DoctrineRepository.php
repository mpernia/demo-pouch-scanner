<?php

namespace App\Src\Shared\Infrastructure\Persistences\Repositories;

use App\Src\Shared\Domain\Contracts\Repository;

abstract class DoctrineRepository implements Repository
{
    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find(int|string $id)
    {
        // TODO: Implement find() method.
    }

    public function findWithParams(int|string $id)
    {
        // TODO: Implement findWithParams() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(int|string $id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int|string $id)
    {
        // TODO: Implement delete() method.
    }
}
