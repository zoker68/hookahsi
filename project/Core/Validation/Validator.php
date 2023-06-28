<?php

namespace Core\Validation;

class Validator extends \Core\DB
{
    use ValidationRules;

    protected array $request = [];
    protected array $checkedData = [];
    protected array $errors = [];

    public function __construct()
    {
        $this->validate();
    }

    public function validated(): array
    {
        return $this->checkedData;
    }

    private function validate(): bool
    {
        $this->request = $this->getData();

        foreach ($this->rules() as $key => $value) {
            if ($this->checkData($key, $value)) {
                $this->checkedData[$key] = $value;
            }
        }

        return empty($this->errors);
    }

    private function checkData($key, $rules): bool
    {
        $handle = $this->request[$key];


        foreach ($rules as $rule) {
            if (stristr($rule, ":")) {
                list($rule, $attributes) = explode(":", $rule);

                $handle = compact('handle', 'attributes', 'key');
            } else {
                $attributes = null;
            }

            if (!$this->$rule($handle)) {
                $this->errors[$key][] = $this->messages($attributes)[$key . "." . $rule] ?? $this->defaultMessage($attributes)[$rule];
            }
        }

        return empty($this->errors[$key]);
    }

    private function getData(): array
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : $_GET;
    }


}