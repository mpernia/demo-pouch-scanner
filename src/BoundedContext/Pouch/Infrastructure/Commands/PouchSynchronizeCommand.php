<?php

namespace App\Src\BoundedContext\Pouch\Infrastructure\Commands;

use App\Src\BoundedContext\Pouch\Application\Actions\PouchSynchronizer;
use Exception;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class PouchSynchronizeCommand extends Command
{
    protected $signature = 'pouch:synchronize';

    protected $description = 'Synchronize processes pouches';

    public function handle(
        PouchSynchronizer $pouchSynchronizer
    ): int
    {
        try {
            $pouchSynchronizer->__invoke('');
        } catch (Exception $exception) {
            return CommandAlias::FAILURE;
        }
        return CommandAlias::SUCCESS;
    }
}
