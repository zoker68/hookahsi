<?php

namespace Core\Validation;

use Core\DB;

class Validator
{
    use ValidationRules;

    protected array $request = [];
    protected array $checkedData = [];
    protected array $errors = [];

    public function __construct()
    {
        $this->validate();
    }

    private function validate(): bool
    {
        $this->request = $this->getData();

        foreach ($this->rules() as $key => $value) {
            if ($this->checkData($key, $value)) {
                $this->checkedData[$key] = $this->request[$key];
            }
        }

        return empty($this->errors);
    }

    public static function validated(): array
    {
        $instance = new static();

        return empty($instance->errors) ? $instance->checkedData : $instance->exception();
    }

    private function exception(): void
    {
        ValidationException::throw($this->errors, $this->request);
    }

    private function checkData($key, $rules): bool
    {
        $value = $this->request[$key];

        foreach ($rules as $rule) {
            if (stristr($rule, ":")) {
                list($rule, $attributes) = explode(":", $rule);
            } else {
                $attributes = null;
            }
            $handle = compact('value', 'attributes', 'key');

            if (!$this->{$rule . 'Validate'}($handle)) {
                $this->errors[$key] = $this->getErrorMessage($rule, $handle);

                return false;
            }
        }

        return empty($this->errors[$key]);
    }

    private function getErrorMessage($rule, $handle): string
    {
        extract($handle);

        return $this->messages($attributes)[$key . "." . $rule] ?? $this->defaultMessage($attributes)[$rule];
    }

    private function getData(): array
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : $_GET;
    }

}