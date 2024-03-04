<?php
require_once('C:/xampp/php/www/webdoctruyen/config/database.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoryModel.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoriestypeModel.php');

class DeleteBookController {
    private $storyModel;

    public function __construct() {
        $this->storyModel = new StoryModel();
    }

    public function index() {
        // Xử lý xóa sách
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $storyIdToDelete = $_GET['id'];

            // Gọi hàm xóa từ StoryModel
            $success = $this->storyModel->deleteStory($storyIdToDelete);

            if ($success) {
                echo "Xóa sách thành công!";
            } else {
                echo "Lỗi khi xóa sách.";
            }
        }
        header('Location: http://localhost:3000/app/views/admin/listbook.php');
        exit();
    }
}

// Sử dụng
$deleteBookController = new DeleteBookController();
$deleteBookController->index();
?>
