<?php

namespace App\Controllers;

use App\Models\Todo;
use App\Requests\Todo\StoreRequest;
use Core\Controller;

class TodoController extends Controller
{
    protected string $headTitle = "Todo";

    public function index(): null
    {
        $todo = (new Todo)->all();

        return $this->view('todo/index', compact('todo'));
    }

    public function create(): null
    {
        return $this->view('todo/create');
    }

    public function store(): null
    {
        $data = StoreRequest::validated();
        $data['user_id'] = auth()['id'];

        (new Todo)->create($data);

        return redirect(route('todo.index'));
    }

}