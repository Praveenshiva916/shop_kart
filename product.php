<?php
require_once 'config.php';
class Product {
    private $db;

    public function __construct() {
        $this->db=new Database();
    }
    public function getAllProducts() {
        $query = "SELECT * FROM products";
        return $this->db->getResults($query);
    }
    public function getProductById($productId){
        $query = "SELECT * FROM products WHERE id =$productId";
        $result = $this->db->getResults($query);
        return !empty($result) ? $result[0]:null;
    }
}
?>