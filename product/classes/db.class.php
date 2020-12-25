<?php

class Db {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "product_list";

    protected function connect() {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $conn = new PDO($dsn, $this->user, $this->pwd);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
        }
    }

}