<?php

namespace Core;

class Session
{
    public static function flash($key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unFlash(): void
    {
        unset($_SESSION['_flash']);
    }
}