<?php

namespace App\Requests\Todo;

use Core\Validation\Validator;

class StoreRequest extends Validator
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['string','required', 'min:3'],
        ];
    }

    public function messages($attr = null): array
    {
        return [];
    }

}