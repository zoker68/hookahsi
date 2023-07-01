<?php

namespace Core;

class Authenticator
{
    public static function login($user): void
    {
        unset($user['password']);
        Session::set('user', $user);
        Session::set('secret', static::getSecurityKey($user));
    }

    public static function logout(): void
    {
        Session::destroy();
    }


    public static function checkAuth(): bool
    {
        if (!Session::has('user')) {
            return false;
        }

        $user = Session::get('user');

        return static::getSecurityKey($user);
    }

    public static function getUserData(): array
    {
        return Session::get('user');
    }

    public static function getSecurityKey($user): string
    {
        return hash('sha256', 'Some' . $user['id'] . 'Key%!(#' . $user['email']);
    }

    public static function checkSecurityKey($user): string
    {
        return hash('sha256', 'Some' . $user['id'] . 'Key%!(#' . $user['email']) === Session::get('secret');
    }
}