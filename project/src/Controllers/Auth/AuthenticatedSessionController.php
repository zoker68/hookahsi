<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Requests\Auth\LoginRequest;
use Core\Authenticator;
use Core\Controller;
use Core\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return $this->view('profile/login');
    }

    public function store()
    {
        $data = LoginRequest::validated();

        $user = (new User)->where('email', $data['email'])->first();

        if (!password_verify($data['password'], $user['password'])) {
            unset($data['password']);
            $error['password'] = "Incorrect password";
            ValidationException::throw($error, $data);
        }
        unset($data['password']);

        Authenticator::login($user);
        redirect('/');
    }

    public function delete(): void
    {
        Authenticator::logout();
        redirect('/');
    }
}