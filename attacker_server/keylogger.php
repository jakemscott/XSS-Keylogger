<?php
require 'vendor/autoload.php';

use App\SQLiteConnection;
use App\SQLiteInsert;
use App\Log;

    if (isset($_POST["keys"]) && isset($_POST['datetime'])) {
        $pdo = (new SQLiteConnection())->connect();
        $insert = new SQLiteInsert($pdo);

        $keys = new Log($_POST["datetime"], $_POST["keys"]);
        $insert->insertLog($keys);
    }
