<?php

namespace App\Requests\Auth;

use Core\Validation\Validator;

class LoginRequest extends Validator
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exist:users,email'],
            'password' => ['string'],
        ];
    }

    public function messages($attr = null): array
    {
        return [
            'email.email' => 'Email format does not valid',
            'email.exist' => 'No user found with this email',
        ];
    }

}