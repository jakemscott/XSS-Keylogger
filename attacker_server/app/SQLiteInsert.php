<?php
namespace App;

class SQLiteInsert {
    private $pdo;
    /**
    * Initialize the object with a specified PDO object
    * @param \PDO $pdo
    */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * @param Log $log
     * @return string
     */
    public function insertLog($log) {
        $sql = 'INSERT INTO LOGS(DATE, KEYS) VALUES(:log_date, :log_keys)';
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == False) {
            return 'ERROR: ' . implode(", ", $this->pdo->errorInfo());
        }
        $stmt->execute([
            ':log_date' => $log->getDate(),
            ':log_keys' => $log->getKeys()
        ]);

        return $this->pdo->lastInsertId();
    }
}