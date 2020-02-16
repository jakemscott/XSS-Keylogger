<?php
namespace App;

class SQLiteCreateTable {
    private $pdo;

    /**
     * SQLiteCreateTable constructor.
     * @param \PDO $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createStartUpTables() {
        $cmd = 'CREATE TABLE IF NOT EXISTS LOGS (
                    ID INT AUTO_INCREMENT PRIMARY KEY,
                    DATE INT NOT NULL,
                    KEYS VARCHAR(255) NOT NULL
                )';
        $this->pdo->exec($cmd);
    }
}