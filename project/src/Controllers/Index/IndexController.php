<?php

namespace App\Controllers\Index;

use Core\Controller;

class IndexController extends Controller
{
    protected string $headTitle = "Главная страница";

    public function __invoke()
    {
        $todo =  1;


        return $this->view('index', compact('todo'));
    }

}