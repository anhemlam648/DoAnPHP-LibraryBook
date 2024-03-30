<?php
require_once('C:/xampp/htdocs/webdoctruyen/config/database.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/models/StoriestypeModel.php');

class DeleteTypeController {
    private $typeModel;

    public function __construct() {
        $this->typeModel = new StoriesTypeModel();
    }

    public function index() {
        // Xử lý xóa sách
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $storyIdToDelete = $_GET['id'];

            // Gọi hàm xóa từ StoryModel
            $success = $this->typeModel->deleteStorytype($storyIdToDelete);

            if ($success) {
                echo "Xóa sách thành công!";
            } else {
                echo "Lỗi khi xóa sách.";
            }
        }
        header('Location: http://localhost:3000/app/views/admin/listbooktype.php');
        exit();
    }
}

// Sử dụng
$deleteTypeController = new DeleteTypeController();
$deleteTypeController->index();
?>
