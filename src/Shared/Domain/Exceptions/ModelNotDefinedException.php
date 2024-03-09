<?php

namespace App\Src\Shared\Domain\Exceptions;

use Exception;

class ModelNotDefinedException extends Exception
{
    public function __construct()
    {
        parent::__construct('No model defined');
    }
}
