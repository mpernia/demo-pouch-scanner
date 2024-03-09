<?php

namespace App\Src\BoundedContext\Pouch\Application\Actions;

use App\Src\BoundedContext\Pouch\Application\DataTransferObjects\EditPouch;
use App\Src\BoundedContext\Pouch\Domain\Contracts\Pouch;
use App\Src\BoundedContext\Pouch\Domain\Contracts\PouchRepository;
use App\Src\BoundedContext\Pouch\Domain\Contracts\UpdaterInterface;

class PouchUpdater implements UpdaterInterface
{
    public function __construct(
        private readonly PouchRepository $repository
    )
    {
    }

    public function __invoke(EditPouch $pouch): Pouch
    {
        // TODO: Implement update() method.
    }
}
