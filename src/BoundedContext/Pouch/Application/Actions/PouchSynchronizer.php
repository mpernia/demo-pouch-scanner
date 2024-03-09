<?php

namespace App\Src\BoundedContext\Pouch\Application\Actions;

use PouchScanner\Domain\Connection;
use PouchScanner\Domain\StorageSetting;
use PouchScanner\Infrastructure\Facades\PouchScanner;

class PouchSynchronizer
{
    public function __invoke(int|string $rollId): void
    {
        $conecction = new Connection(
            hostname: 'slim',
            username: 'admin',
            password: 'password',
            protocol: 'http',
            port: 8080
        );
        $settings = new StorageSetting(
            storageDirectory:'roll-requests',
            downloadImageDirectory: 'pouch-images',
            storageDisk: 'local',
            storageRequest: true,
            downloadImages: true
        );
        $rolls = PouchScanner::configure($conecction, $settings)->login();
        //dd($rolls->getFinalizedRolls());
        //dd($rolls->getInProgressRolls());S
        //dd($rolls->getNotInspectedRolls());
        dd($rolls->getRoll('123'));

        foreach ($rolls as $roll) {
            $roll = PouchScanner::getRoll($roll->getPatientRoll());
        }
    }
}
