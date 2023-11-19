<?php
namespace PHP_SAB;
use PDO;
class Database {
    private $host = Config::DB_HOST;
    private $db_name = Config::DB_NAME;
    private $username = Config::DB_USER;
    private $password = Config::DB_PASS;
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
