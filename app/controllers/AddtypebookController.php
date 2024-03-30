<?php
require_once('C:/xampp/htdocs/webdoctruyen/config/config.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/models/StoriestypeModel.php');

class AddTypeBookController
{
    private  $typeModel;
    public function __construct()
    {
        $this->typeModel = new StoriesTypeModel();
    }

    public function index()
    {
        // Xử lý form thêm loại
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $name = $_POST['name'];
            // Thêm loại vào database
            $result = $this->typeModel->addType($name);

            if ($result) {
                // Chuyển hướng về trang danh sách sách sau khi thêm thành công
                header('Location: http://localhost:3000/app/views/admin/listbooktype.php');
                exit();
            } else {
                echo "Thêm sách thất bại.";
            }
        }

        // Nếu không phải là POST request, hiển thị trang thêm loại
        include('C:/xampp/htdocs/webdoctruyen/app/views/admin/addtype.php');
    }
}

// Sử dụng
$addtypebookController = new AddTypeBookController();
$addtypebookController->index();
?>
