<?php
require_once('C:/xampp/htdocs/webdoctruyen/config/database.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/models/StoryModel.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/models/StoriestypeModel.php');

class AddBookController
{
    private $storyModel;
    private  $typeModel;
    public function __construct()
    {
        $this->storyModel = new StoryModel();
        $this->typeModel = new StoriesTypeModel();
    }

    public function index()
    {
        $imageUploadPath = 'C:/xampp/htdocs/webdoctruyen/public/image/'; // Đảm bảo kết thúc bằng dấu '/'
         // Lấy danh sách loại sách ngay từ đầu
        $typeModel = new StoriesTypeModel();
        $typeList = $this->typeModel->getAllTypes();
        // Xử lý form thêm sách
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $tmpName = $_FILES['image']['tmp_name'];

                if (file_exists($tmpName)) {
                    // Tạo tên file mới để tránh trùng lặp
                    $imageFileName = uniqid('image_') . '.png'; // Có thể sử dụng định dạng khác nếu cần

                    // Tạo đường dẫn lưu trữ hình ảnh
                    $imageFilePath = $imageUploadPath . $imageFileName;

                    // Di chuyển hình ảnh vào thư mục lưu trữ
                    move_uploaded_file($tmpName, $imageFilePath);
                } else {
                    echo "File không tồn tại.";
                }
            }
            $author = $_POST['author'];
            $type_id = $_POST['type_id'];
            // Thêm sách vào database
            // $result = $this->storyModel->addStory($title, $description, $imageFilePath); 
            $result = $this->storyModel->addStory($title, $description, $imageFilePath, $author, $type_id, $content);

            if ($result) {
                // Chuyển hướng về trang danh sách sách sau khi thêm thành công
                header('Location: http://localhost:3000/app/views/admin/listbook.php');
                exit();
            } else {
                echo "Thêm sách thất bại.";
            }
        }

        // Nếu không phải là POST request, hiển thị trang thêm sách
        include('C:/xampp/htdocs/webdoctruyen/app/views/admin/add.php');
    }
}

// Sử dụng
$addBookController = new AddBookController();
$addBookController->index();
// $typeModel = new StoriesTypeModel();
// $allTypes = $typeModel->getAllTypes();
// print_r($allTypes);
?>
