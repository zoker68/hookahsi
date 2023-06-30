<?php

namespace App\Controllers\Auth;

use App\Requests\Auth\RegistrationValidator;
use Core\Authenticator;
use Core\Controller;

class RegisterController extends Controller
{
    protected string $headTitle = "Registration";

    public function create()
    {
        return $this->view('profile/register');
    }

    public function store(): void
    {
        $data = RegistrationValidator::validated();

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $user = $this->insert('users', $data);

        Authenticator::login($user);

        redirect('/');
    }
}