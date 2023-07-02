<?php

namespace Core;

abstract class Model extends DB
{
    protected string $table;
    private array $where = [];
    private array $select = [];


    public function all(): array
    {
        $instance = new static();

        return $instance->query("SELECT * FROM `" . $instance->table . "`")->get();
    }

    public function create($data)
    {
        $instance = new static();

        return $instance->insert($instance->table, $data);
    }

    public function getQuery(): DB
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
        return $this->getQuery()->getAll()[0];
    }

    public function getSelect(): string
    {
        return empty($this->select) ? '*' : implode(',', $this->select);
    }

    public function getWhere(): ?string
    {
        if (empty($this->where)) return null;

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