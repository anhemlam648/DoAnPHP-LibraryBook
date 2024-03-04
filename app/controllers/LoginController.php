<?php
require_once('C:/xampp/php/www/webdoctruyen/config/database.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/UserModel.php');

class LoginController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $errorMessage = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Xử lý đăng nhập
            $result = $this->userModel->verifyUser($username, $password);
            if ($result) {
                // Chuyển hướng về trang danh sách sách sau khi đăng nhập thành công
                header('Location: http://localhost:3000/app/views/user/index.php');
                exit();
            } else {
                $errorMessage = "Đăng nhập thất bại. Kiểm tra thông tin đăng nhập.";
            }
        }

        // Nếu không phải là POST request, hiển thị trang đăng nhập
        include('C:/xampp/php/www/webdoctruyen/app/views/user/login.php');
    }
}

// Sử dụng
$loginController = new LoginController();
$loginController->index();
?>
