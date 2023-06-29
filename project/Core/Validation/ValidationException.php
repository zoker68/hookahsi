<?php

namespace Core\Validation;

class ValidationException extends \Exception
{
    public readonly array $error;
    public readonly array $old;

    public static function throw($error, $old): self
    {
        $instance = new static();

        $instance->error = $error;
        $instance->old = $old;

        throw $instance;
    }

}