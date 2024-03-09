<?php

namespace App\Src\BoundedContext\Pouch\Domain\Contracts;

interface DestroyerInterface
{
    public function __invoke(int|string $value, string $column = 'id') : void;
}
