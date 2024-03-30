<!-- <?php
include_once '/xampp/htdocs/webdoctruyen/app/controllers/DefaultController.php';

// Kiểm tra xem session đã được khởi tạo hay chưa
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Khởi tạo session nếu chưa được khởi tạo
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy ID của truyện
    $storyId = $_POST['story_id']; // Sửa tên key của $_POST thành 'story_id'

    // Kiểm tra nếu người dùng đã đăng nhập
    if (isset($_SESSION['user_id'])) {
        $likeCount = isset($_COOKIE["story_" . $storyId . "_likes"]) ? $_COOKIE["story_" . $storyId . "_likes"] : 0;

        // Cập nhật cơ sở dữ liệu với số lượng thích mới (nếu cần)
        // $storyModel->updateLikes($storyId, $likeCount);

        // Phản hồi về việc thích thành công
        echo "Thích truyện thành công!";
    } else {
        // Phản hồi nếu người dùng chưa đăng nhập
        http_response_code(401);
        echo "Vui lòng đăng nhập để thích truyện!";
    }
}
?> -->
