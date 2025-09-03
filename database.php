<?php
class Database {
    public $connection;

    public function __construct($config) {
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset=utf8mb4';
        $this->connection = new PDO($dsn, $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params = []) {
        $statement = $this->connection->prepare($sql);

        // If SQL has named placeholders, make sure $params is associative
        if (preg_match('/:\w+/', $sql) && array_values($params) === $params) {
            throw new Exception("Named placeholders require an associative array.");
        }

        $statement->execute($params);
        return $statement;
    }

    public function findOrFail($table, $id) {
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $statement = $this->query($sql, ['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            http_response_code(404);
            echo "Record not found";
            exit;
        }

        return $result;
    }
}
