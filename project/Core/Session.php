<?php

namespace Core;

class Session
{
    public static function has($key): mixed
    {
        return isset($_SESSION[$key]);
    }

    public static function get($key): mixed
    {
        return $_SESSION[$key];
    }

    public static function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function flash($key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unFlash(): void
    {
        unset($_SESSION['_flash']);
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }

    public static function destroy(): void
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600);
    }
}