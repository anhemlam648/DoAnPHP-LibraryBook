<?php
class Database {
    private $host = "localhost";
    private $db_name = "readbook";
    private $username = "root";
    private $password = "";
    public $conn;

    // Tạo kết nối
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }

        // Đã kiểm tra kết nối
    }

    public function createTablesFromScript($scriptPath) {
        try {
            $sqlScript = file_get_contents($scriptPath);
            
            if ($this->conn->multi_query($sqlScript)) {
                do {
                    // Lặp để tiêu diệt tất cả các kết quả trong buffer
                } while ($this->conn->next_result());
                echo "Tables created successfully.\n";
            } else {
                echo "Error creating tables: " . $this->conn->error;
            }
        } catch (Exception $e) {
            echo "Error creating tables: " . $e->getMessage();
        }

        $this->conn->close(); // Đóng kết nối 
    }
}
?>
