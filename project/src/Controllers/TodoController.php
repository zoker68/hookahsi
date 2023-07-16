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
        $todo = Todo::all();

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

        Todo::create($data);

        return redirect(route('todo.index'));
    }

    public function show(): null
    {
        $todo = Todo::find($_GET['todo']);

        return $this->view('todo/show', compact('todo'));
    }

}