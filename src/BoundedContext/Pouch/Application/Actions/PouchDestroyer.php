<?php

namespace App\Src\BoundedContext\Pouch\Application\Actions;

use App\Src\BoundedContext\Pouch\Domain\Contracts\DestroyerInterface;
use App\Src\BoundedContext\Pouch\Domain\Contracts\PouchRepository;

class PouchDestroyer implements DestroyerInterface
{
    public function __construct(
        private readonly PouchRepository $repository
    )
    {
    }

    public function __invoke(int|string $value, string $column = 'id'): void
    {
        // TODO: Implement __invoke() method.
    }
}
