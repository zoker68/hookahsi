<?php

namespace App\Controllers\Index;

use Core\Controller;

class IndexController extends Controller
{
    protected string $headTitle = "Главная страница";

    public function __invoke()
    {
        $todo = $this->query("SELECT * FROM todo where id = :id", ['id' => 1])->firstOrFail();



        return $this->view('index', compact('todo'));
    }

}