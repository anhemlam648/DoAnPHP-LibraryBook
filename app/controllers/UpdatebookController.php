<?php
require_once('C:/xampp/php/www/webdoctruyen/config/database.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoryModel.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoriestypeModel.php');

class UpdateBookController
{
    private $storyModel;
    private $typeModel;

    public function __construct()
    {
        $this->storyModel = new StoryModel();
        $this->typeModel = new StoriesTypeModel();
    }

    public function index()
    {
        
        $typeModel = new StoriesTypeModel();
        $typeList = $this->typeModel->getAllTypes();
        // Xử lý form cập nhật sách
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $author = $_POST['author'];
            $typeId = $_POST['type_id'];
            $content = $_POST['content'];

            // Xử lý upload ảnh mới nếu có
            $newImage = '';

            if ($_FILES['image']['size'] > 0) {
                $imageUploadPath = 'C:/xampp/php/www/webdoctruyen/public/image/';
                $uploadFile = $imageUploadPath . basename($_FILES['image']['name']);

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $newImage = $uploadFile;
                } else {
                    echo 'Lỗi khi tải lên ảnh.';
                    exit();
                }
            }

            // Cập nhật thông tin sách trong database, bao gồm cả ảnh nếu có
            $success = $this->storyModel->updateStory($id, $title, $description, $newImage, $author, $typeId, $content);

            if ($success) {
                // Chuyển hướng về trang danh sách sách sau khi cập nhật thành công
                header('Location: http://localhost:3000/app/views/admin/listbook.php');
                exit();
            } else {
                echo 'Lỗi khi cập nhật sách.';
            }
        }
        include('C:/xampp/php/www/webdoctruyen/app/views/admin/update.php');
    }
}

// Sử dụng
$updateBookController = new UpdateBookController();
$updateBookController->index();
?>
