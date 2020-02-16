<?php
namespace App;

class SQLiteConnection {
    private $pdo;
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_DB);
        }
        return $this->pdo;
    }
}