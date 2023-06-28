<?php

namespace App\Requests\Auth;

use Core\Validation\Validator;

class RegistrationValidator extends Validator
{
    public function rules(): array
    {
        return [
            'email' => ['required','email', 'unique:users'],
            'password' => ['string', 'min:6']
        ];
    }

    public function messages($attr = null): array
    {
        return [
            'email.email' => 'Email format does not valid',
            'email.unique' => 'This email is already in the database',
        ];
    }

}