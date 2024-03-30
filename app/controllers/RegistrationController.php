<?php
require_once('C:/xampp/htdocs/webdoctruyen/config/database.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/models/UserModel.php');

class RegisterController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $registrationMessage = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            // Xử lý đăng ký
            $result = $this->userModel->addUser($username, $password, $name, $email);
            if ($result) {
                header('Location: http://localhost:3000/app/views/user/login.php');
                exit();
            } else {
                $registrationMessage = "Đăng ký thất bại. Vui lòng thử lại.";
            }
        }

        // Nếu không phải là POST request, hiển thị trang đăng ký
        include('C:/xampp/php/www/webdoctruyen/app/views/user/register.php');
    }
}

// Sử dụng
$registerController = new RegisterController();
$registerController->index();
?>
