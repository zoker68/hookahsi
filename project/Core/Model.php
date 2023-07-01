<?php

namespace Core;

class Model extends DB
{
    protected string $table;
    private DB $instance;


    //TODO сделать конструктор синглтон
    public static function all(): array
    {
        $instance = new static();

        return $instance->query("SELECT * FROM `" . $instance->table . "`")->get();
    }

    public static function create($data)
    {
        $instance = new static();

        return $instance->insert($instance->table, $data);
    }
}