<?php
require_once('C:/xampp/php/www/webdoctruyen/config/database.php');

class StoriesTypeModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Lấy danh sách tất cả các loại truyện
    public function getAllTypes() {
        $query = "SELECT * FROM storiestype";
        $result = $this->db->conn->query($query);

        if ($result === false) {
            // Xử lý lỗi truy vấn
            die("Query failed: " . $this->db->conn->error);
        }

        $typesList = $result->fetch_all(MYSQLI_ASSOC);
        return $typesList;
    }
    public function addType($name) {
        $query = "INSERT INTO storiestype (name) 
                  VALUES ('$name')";
        return $this->db->conn->query($query);
    }
}

// Sử dụng
$typeModel = new StoriesTypeModel();
$allTypes = $typeModel->getAllTypes();
// print_r($allTypes);
?>