<?php
require_once('C:/xampp/php/www/webdoctruyen/config/database.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoriestypeModel.php');

class UpdateTypeController
{
    private $typeModel;

    public function __construct()
    {
       
        $this->typeModel = new StoriesTypeModel();
    }

    public function index()
    {
        
        // Xử lý form cập nhật sách
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            // Cập nhật thông tin sách trong database, bao gồm cả ảnh nếu có
            $success = $this->typeModel->updateStorytype($id, $name);

            if ($success) {
                // Chuyển hướng về trang danh sách sách sau khi cập nhật thành công
                header('Location: http://localhost:3000/app/views/admin/listbooktype.php');
                exit();
            } else {
                echo 'Lỗi khi cập nhật sách.';
            }
        }
        include('C:/xampp/php/www/webdoctruyen/app/views/admin/updatetype.php');
    }
}

// Sử dụng
$updateTypeController = new UpdateTypeController();
$updateTypeController->index();
?>
