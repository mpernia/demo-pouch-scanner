<?php

namespace App\Src\Shared\Domain\Contracts;

interface Repository
{
    public function all();

    public function find(int|string $id);

    public function findWithParams(int|string $id);

    public function create(array $data);

    public function update(int|string $id, array $data);

    public function delete(int|string $id);
}
