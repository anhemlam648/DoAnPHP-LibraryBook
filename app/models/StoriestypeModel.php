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
    public function updateStorytype($id, $name) {
        $query = "UPDATE storiestype SET 
                  name = '$name'
                  WHERE id = $id";
    
        return $this->db->conn->query($query);
    }
    public function deleteStorytype($id) {
        $query = "DELETE FROM storiestype WHERE id = $id";
        return $this->db->conn->query($query);
    }
    public function getStoriesByTypeId($typeId)
    { 
        $sql = "SELECT * FROM stories WHERE type_id = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param('i', $typeId);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) {
            die("Query failed: " . $this->db->conn->error);
        }
    
        $storiesList = [];
        while ($row = $result->fetch_assoc()) {
            $storiesList[] = $row;
        }
        return $storiesList;
    }
}

// Sử dụng
$typeModel = new StoriesTypeModel();
$allTypes = $typeModel->getAllTypes();
// $allTypes = $typeModel->getStoriesByTypeId($typeId);
// print_r($allTypes);
?>