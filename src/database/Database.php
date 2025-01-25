<?php

class Database {
    private $host, $name, $user, $pass, $pdo;

    public function __construct() {
        $this->host = App::getEnv('DB_HOST');
        $this->name = App::getEnv('DB_NAME');
        $this->user = App::getEnv('DB_USER');
        $this->pass = App::getEnv('DB_PASS');
    }

    public function getConnection() {
        if (!$this->pdo) {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }

    public function closeConnection() {
        $this->pdo = null;
    }
}
?>