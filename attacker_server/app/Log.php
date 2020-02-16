<?php
namespace App;

class Log {
    private $date;
    private $keys;

    function __construct($date, $keys) {
        $this->date = $date;
        $this->keys = $keys;
    }

    public function getDate() {
        return $this->date;
    }
    public function getKeys() {
        return $this->keys;
    }
}