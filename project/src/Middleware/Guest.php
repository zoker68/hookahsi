<?php

namespace App\Middleware;

use Core\Authenticator;

class Guest
{
    public function handle(): void
    {
        if (Authenticator::checkAuth()) {
            abort(403);
        }
    }
}