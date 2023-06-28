<?php

namespace Core;

use App\Middleware\Authentication;
use App\Middleware\Guest;

class Middleware
{
    public const MAP = [
        'auth' => Authentication::class,
        'guest' => Guest::class,
    ];

    public static function resolve($key)
    {
        if (!$key) return;

        $middleware = self::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("Middleware {$key} does not exist");
        }

        return (new $middleware)->handle();
    }
}