<?php
require_once('C:/xampp/php/www/webdoctruyen/config/database.php');

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->db->conn->query($query);

        if ($result === false) {
            // Xử lý lỗi truy vấn
            die("Query failed: " . $this->db->conn->error);
        }

        $typesList = $result->fetch_all(MYSQLI_ASSOC);
        return $typesList;
    }

    public function getUserById($userId)
    {
        $query = "SELECT * FROM users WHERE id = $userId";
        $result = $this->db->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; // Trả về null nếu không tìm thấy người dùng
        }
    }

    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->db->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; // Trả về null nếu không tìm thấy người dùng
        }
    }
    public function Deleteuser($userId){
        $query ="DELETE FROM users WHERE id = $userId";
        return $this->db->conn->query($query);
    }

    // public function addUser($username, $password, $name, $email) {
    //         $trimmedPassword = trim($password);
    //         $hashedPassword = password_hash($trimmedPassword, PASSWORD_DEFAULT);
    //         $query = "INSERT INTO users (username, password, name, email) 
    //                 VALUES ('$username', '$hashedPassword', '$name', '$email')";

    //         return $this->db->conn->query($query);
    //     }

    public function addUser($username, $password, $name, $email)
    {
        $trimmedPassword = trim($password);
        $hashedPassword = password_hash($trimmedPassword, PASSWORD_DEFAULT);

        $userQuery = "INSERT INTO users (username, password, name, email) 
                      VALUES ('$username', '$hashedPassword', '$name', '$email')";
        
        $this->db->conn->query($userQuery);
        $userId = $this->db->conn->insert_id; 

        $roleQuery = "INSERT INTO user_roles (user_id, role_id) VALUES ('$userId', '2')";
        $this->db->conn->query($roleQuery);

        return true; 
    }

    // public function verifyUser($username, $password)
    // {
    //     $query = "SELECT * FROM users WHERE username = '$username'";
    //     $result = $this->db->conn->query($query);
    
    //     if ($result && $result->num_rows > 0) {
    //         $user = $result->fetch_assoc();
    //         $hashedPasswordFromDB = $user['password'];
    
    //         if (password_verify($password, $hashedPasswordFromDB)) {
    //             // Password is correct. Return user information.
    //             return $user;
    //         } else {
    //             // Password verification failed. Check password hashing.
    //             echo "Đăng nhập thất bại. Kiểm tra thông tin đăng nhập.";
    //         }
    //     } else {
    //         // User not found. Check the username.
    //         echo "Đăng nhập thất bại. Kiểm tra thông tin đăng nhập.";
    //     }
    
    //     return null;
    // }
    public function verifyUser($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->db->conn->query($query);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $hashedPasswordFromDB = $user['password'];

            if (password_verify($password, $hashedPasswordFromDB)) {
                session_start();
                $_SESSION['user_id'] = $user['id']; // Lưu cả id của người dùng vào session
                $_SESSION['users'] = $user['name'];
                return $user;
            }
        }

        // Authentication failed.
        return null;
    }

}

$userModel = new UserModel();
$alluser = $userModel->getAllUsers();
// print_r($alluser);
?>
