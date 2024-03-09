<?php

namespace App\Src\BoundedContext\Pouch\Application\Actions;

use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\FindPouch;
use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\Pouch;
use App\Src\BoundedContext\Pouch\Domain\Contracts\FinderInterface;
use App\Src\BoundedContext\Pouch\Domain\Contracts\PouchRepository;

class PouchFinder implements FinderInterface
{
    public function __construct(
        private readonly PouchRepository $repository
    )
    {
    }

    /** @return null|Pouch[]|Pouch */
    public function __invoke(int|string|null $value = null, string $column = 'id'): null|array|Pouch
    {
        return is_null($value) ? $this->all() : $this->find($value, $column);
    }

    /** @return null|Pouch[] */
    public function find(int|string $value, string $column = 'id'): ?Pouch
    {
        // TODO: Implement find() method.
    }

    /** @return null|Pouch[] */
    public function all(): ?array
    {
        // TODO: Implement all() method.
    }

    public function findWithParams(FindPouch $params): ?array
    {
        // TODO: Implement findWithParams() method.
    }
}
