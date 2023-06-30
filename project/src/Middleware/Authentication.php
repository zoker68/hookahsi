<?php

namespace App\Middleware;

use Core\Authenticator;

class Authentication
{
    public function handle(): void
    {
        if (!Authenticator::checkAuth()) {
            abort(403);
        }
    }
}