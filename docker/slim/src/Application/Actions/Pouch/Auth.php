<?php

namespace App\Application\Actions\Pouch;

use SimpleXMLElement;

class Auth
{
    public static function login(SimpleXMLElement $xml): bool
    {
        $username = (string)$xml->Username;
        $password = (string)$xml->Password;
        return $username === 'admin' && $password === 'password';
    }
}
