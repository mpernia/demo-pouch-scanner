<?php

namespace App\Src\BoundedContext\Pouch\Domain\Contracts;


use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\FindPouch;
use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\Pouch;

interface FinderInterface

{
    public function __invoke(null|int|string $value = null, string $column = 'id'): null|array|Pouch;

    public function find(int|string $value, string $column = 'id') : ?Pouch;

    /** @return null|Pouch[] */
    public function all() : ?array;

    /** @return null|Pouch[] */
    public function findWithParams(FindPouch $params): ?array;
}
