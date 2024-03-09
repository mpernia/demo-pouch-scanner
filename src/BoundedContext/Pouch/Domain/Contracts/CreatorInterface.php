<?php

namespace App\Src\BoundedContext\Pouch\Domain\Contracts;

use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\NewPouch;
use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\Pouch;
interface CreatorInterface
{
    public function __invoke(NewPouch $pouch): Pouch;
}
