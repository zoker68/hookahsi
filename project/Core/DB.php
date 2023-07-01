<?php

namespace Core;

use PDO;
use PDOStatement;

class DB
{
    private static ?PDO $connection = null;
    private PDOStatement $statement;

    public function __construct()
    {
        $config = require(BASE_PATH . "config.php");

        $dsn = "mysql:" . http_build_query($config['db']['dsn'], "", ";");

        if (self::$connection == null) {
            self::$connection = new PDO($dsn, $config['db']['auth']['username'], $config['db']['auth']['password'], [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        } else {
            return self::$connection;
        }
    }

    public function query($query, $params = []): DB
    {
        $this->statement = self::$connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get(): array
    {
        return $this->statement->fetchAll();
    }

    public function first()
    {
        return $this->statement->fetch();
    }

    public function firstOrFail()
    {
        $result = $this->first();

        if (!$result) {
            abort(404);
        }

        return $result;
    }

    public function InsertId(): int
    {
        return self::$connection->lastInsertId();
    }

    public function insert($table, $data): array
    {
        $to = array_keys($data);

        $query = "INSERT INTO " . $table . " (" . implode(", ", $to) . ") VALUES (:" . implode(", :", $to) . ")";

        $this->query($query, $data);

        $data['id'] = $this->InsertId();

        return $data;
    }
}