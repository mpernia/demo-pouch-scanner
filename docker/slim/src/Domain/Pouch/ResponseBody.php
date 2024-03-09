<?php

namespace App\Domain\Pouch;

class ResponseBody
{
    public static function healthCheck(): string
    {
        return self::simplify('<?xml version="1.0" encoding="UTF-8"?>
            <root>
                <element1>Contenido 1</element1>
                <element2>Contenido 2</element2>
            </root>'
        );
    }

    public static function invalidToken(): string
    {
        return self::simplify('<?xml version="1.0" encoding="UTF-8"?>
            <Content>
                <Success>False</Success>
                <Error>Unauthorized: Invalid Session key</Error>
            </Content>'
        );
    }

    public static function unauthorized(): string
    {
        return self::simplify('<?xml version="1.0" encoding="UTF-8"?>
            <Content>
                <Success>False</Success>
                <Error>Unauthorized: Invalid username or password</Error>
            </Content>'
        );
    }

    public static function accepted(string $token): string
    {
        return self::simplify('<?xml version="1.0" encoding="UTF-8"?>
            <Content>
                <Success>True</Success>
                <Data>'. $token . '</Data>
            </Content>'
        );
    }

    public static function badRequest(): string
    {
        return self::simplify('<?xml version="1.0" encoding="UTF-8"?>
            <Content>
                <Success>False</Success>
                <Error>Bad Request</Error>
            </Content>'
        );
    }

    public static function notFound(): string
    {
        return self::simplify('<?xml version="1.0" encoding="UTF-8"?>
            <Content>
                <Success>False</Success>
                <Error>The roll id is required</Error>
            </Content>'
        );
    }

    public static function rolls(string $xmlContent): string
    {
        return self::simplify($xmlContent);
    }

    protected static function simplify(string $xmlContent): string
    {
        return preg_replace('/>\s+</', '><', trim($xmlContent));
    }
}
