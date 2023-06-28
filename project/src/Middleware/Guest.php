<?php

namespace App\Middleware;

class Guest
{

    public function handle(): void
    {
        //TODO

        if (false) {
            redirect(route('index'));
            exit;
        }
    }
}