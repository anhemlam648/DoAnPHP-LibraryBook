<?php
require_once('C:/xampp/php/www/webdoctruyen/config/database.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/UserModel.php');

class DeleteUserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index() {
        // Xử lý xóa user
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $userIdToDelete = $_GET['id'];

            // Gọi hàm xóa từ userModel
            $success = $this->userModel->Deleteuser($userIdToDelete);

            if ($success) {
                echo "Xóa user thành công!";
            } else {
                echo "Lỗi khi xóa user.";
            }
        }
        header('Location: http://localhost:3000/app/views/admin/listuser.php');
        exit();
    }
}

// Sử dụng
$deleteuserController = new DeleteUserController();
$deleteuserController->index();
?>
