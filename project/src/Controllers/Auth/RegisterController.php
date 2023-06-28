<?php

namespace App\Controllers\Auth;

use App\Requests\Auth\RegistrationValidator;
use Core\Controller;

class RegisterController extends Controller
{
    protected string $headTitle = "Registration";

    public function create()
    {
        return $this->view('profile/register');
    }

    public function store()
    {
        $validator = new RegistrationValidator();
        $data = $validator->validated();
        dd($data);
    }
}