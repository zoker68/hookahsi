<?php

namespace Core\Validation;

trait ValidationRules
{
    private function emailValidate($value): bool
    {
        extract($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    private function requiredValidate($value): bool
    {
        extract($value);

        return isset($value);
    }

    private function uniqueValidate($value): bool
    {
        return $this->checkInBase($value);
    }

    private function existValidate($value): bool
    {
        return !$this->checkInBase($value);
    }

    private function checkInBase($value): bool
    {
        extract($value);

        if (stristr($attributes, ",")) {
            list($table, $filed) = explode(",", $attributes);
        } else {
            $table = $attributes;
            $filed = $key;
        }

        $result = $this->query("SELECT count(id) as `count` FROM " . $table . " WHERE `" . $filed . "` = :value", ['value' => $value])->first();

        return $result['count'] === 0;

    }

    private function stringValidate($value): bool
    {
        extract($value);

        return is_string($value);
    }

    private function minValidate($value): bool
    {
        extract($value);

        return strlen(trim($value)) >= $attributes;
    }

    private function maxValidate($value): bool
    {
        extract($value);

        return strlen(trim($handle)) <= $attributes;
    }

    private function confirmedValidate($value): bool
    {
        extract($value);

        return $_POST[$key . '_confirmation'] === $value;
    }

    private function defaultMessage($attr = null): array
    {
        return [
            'email' => 'Email format does not valid',
            'required' => 'Field is required',
            'unique' => 'This field must be unique',
            'exist' => 'No value found',
            'string' => 'This field must be a string value',
            'max' => 'This field can contain maximum ' . $attr . ' characters',
            'min' => 'This field can contain minimum ' . $attr . ' characters',
            'confirmed' => 'Invalid entry in the confirmation field.'
        ];
    }
}