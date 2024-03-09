<?php

namespace App\Src\BoundedContext\Pouch\Application\Actions;

use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\NewPouch;
use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\Pouch;
use App\Src\BoundedContext\Pouch\Domain\Contracts\CreatorInterface;
use App\Src\BoundedContext\Pouch\Domain\Contracts\PouchRepository;

class PouchCreator implements CreatorInterface
{
    public function __construct(
        private readonly PouchRepository $repository
    )
    {
    }

    public static function __invoke(NewPouch $pouch): Pouch
    {
        // TODO: Implement create() method.
    }
}
