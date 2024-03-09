<?php

namespace App\Application\Actions\Pouch;

class XmlReader
{
    public static function read(?string $filename): string
    {
        if (is_null($filename)) {
            return '<Error>Roll ID not found</Error>';
        }
        $filepath = sprintf('%s/src/Infrastructure/Resources/%s.xml', ABSOLUTE_PATH, $filename);
        return file_exists($filepath) ? file_get_contents($filepath) : '';
    }
}
