<?php

namespace App\Controllers\Index;

class IndexController
{
    public function __invoke()
    {
        return view('index');
    }

}