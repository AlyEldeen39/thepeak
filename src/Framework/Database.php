<?php

declare(strict_types=1);

namespace Framework;

use PDO;
use PDOException, PDOStatement;

class Database
{
    private PDO $connection;
    private PDOStatement $stmt;

    public function __construct($driver, $config, $user, $pass)
    {
        $driver = 'mysql';
        $config = http_build_query(data: $config, arg_separator: ';');

        $dsn = "{$driver}:{$config}";

        try {
            $this->connection = new PDO($dsn, $user, $pass);
        } catch (PDOException) {
        }
    }

    public function query(string $query, array $params = [])
    {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);

        return $this;
    }

    public function fetch()
    {
        return $this->stmt->fetchColumn();
    }
}
