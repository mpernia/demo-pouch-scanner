<?php

namespace App\Src\BoundedContext\Pouch\Infrastructure\Repositories;

use App\Src\Shared\Infrastructure\Persistences\Models\Pouch;
use App\Src\Shared\Infrastructure\Persistences\Repositories\EloquentRepository;

class PouchEloquentRepository extends EloquentRepository
{
    public function setModel(): string
    {
        return Pouch::class;
    }
}
