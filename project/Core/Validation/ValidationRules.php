<?php

namespace Core\Validation;

trait ValidationRules
{
    private function email($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    private function required($value): bool
    {
        return isset($value);
    }

    private function unique($value): bool
    {
        extract($value);

        if (stristr($attributes, ",")) {
            list($table, $filed) = explode(",", $attributes);
        } else {
            $table = $attributes;
            $filed = $key;
        }

        $result = $this->query("SELECT count(id) as `count` FROM " . $table . " WHERE `" . $filed . "` = :key", ['key' => $handle])->first();

        return $result['count'] === 0;

    }

    private function string($value): bool
    {
        return is_string($value);
    }

    private function min($value): bool
    {
        extract($value);

        return strlen($handle) >= $attributes;
    }

    private function max($value): bool
    {
        extract($value);

        return strlen($handle) <= $attributes;
    }

    private function defaultMessage($attr = null): array
    {
        return [
            'email' => 'Email format does not valid',
            'required' => 'Field is required',
            'unique' => 'This field must be unique',
            'string' => 'This field must be a string value',
            'max' => 'This field can contain maximum ' . $attr . ' characters',
            'min' => 'This field can contain minimum ' . $attr . ' characters',
        ];
    }
}