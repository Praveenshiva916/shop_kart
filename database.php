<?php
require_once 'config.php';
class Database {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

        if ($this->conn->connect_error) {
            die("Connection failed:".$this->conn->connect_error);
        }
    }
    public function executeQuery($query) {
        return $this->conn->query($query);
    }
    public function getResults($query) {
        $result = $this->executeQuery($query);
        if($result) {
        if($result->num_rows>0) {
            $data = array();
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }
}
}
?>