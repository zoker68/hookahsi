<?php

namespace Core;

abstract class Model extends DB
{
    protected string $table;
    protected string $primary = "id";
    private array $where = [];
    private array $select = [];

    public static function all(): array
    {
        $instance = new static();

        return $instance->query("SELECT * FROM `" . $instance->table . "`")->get();
    }

    public static function find($primary): array
    {
        $instance = new static();

        return $instance->query("SELECT * FROM `" . $instance->table . "` WHERE `" . $instance->primary . "`= ?", [$primary])->firstOrFail();
    }

    public static function create($data): array
    {
        $instance = new static();

        return $instance->insert($instance->table, $data);
    }

    public function getQuery(): self
    {
        $query = "SELECT " . $this->getSelect() . " FROM " . $this->table . " " . $this->getWhere();
        return $this->query($query, $this->where);
    }

    public function get(): array
    {
        return $this->getQuery()->getAll();
    }

    public function first(): array
    {
        return $this->getQuery()->getFirst();
    }

    public function getSelect(): string
    {
        return empty($this->select) ? '*' : implode(',', $this->select);
    }

    public function getWhere(): ?string
    {
        if (empty($this->where)) return null;

        $whereParam = [];

        foreach ($this->where as $key => $value) {
            $whereParam[] = "`" . $key . "`" . "= :" . $key;
        }

        return "WHERE " . implode(' AND ', $whereParam);
    }

    public function where($key, $value): self
    {
        $this->where[$key] = $value;

        return $this;
    }

    public function select($select): self
    {
        $this->select[] = $select;

        return $this;
    }


}