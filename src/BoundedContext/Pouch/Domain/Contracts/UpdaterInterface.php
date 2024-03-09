<?php

namespace App\Src\BoundedContext\Pouch\Domain\Contracts;

use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\EditPouch;

interface UpdaterInterface
{
    public function __invoke(EditPouch $pouch) : Pouch;
}
