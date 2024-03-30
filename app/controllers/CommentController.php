<?php
require_once('C:/xampp/htdocs/webdoctruyen/app/models/CommentModel.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/controllers/DefaultController.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/models/UserModel.php');

class CommentController {
    public function addComment() {
        // Bắt đầu phiên làm việc với session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Kiểm tra nếu request là POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $content = $_POST['comment_content'];
            $storyId = $_POST['story_id'];
            
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (isset($_SESSION['users'])) {
                $userId = $_SESSION['user_id'];
    
                // Tạo một đối tượng CommentModel
                $commentModel = new CommentModel();
                // Kiểm tra xem người dùng có tồn tại hay không
                if ($userId) {
                    // Gọi phương thức addComment của CommentModel để thêm bình luận
                    if ($commentModel->addComment($content,$userId, $storyId)) {
                        // Nếu thêm bình luận thành công, bạn có thể thực hiện hành động tiếp theo, chẳng hạn chuyển hướng đến trang khác hoặc hiển thị thông báo thành công.
                        header("Location: http://localhost:3000/app/views/user/read.php?id=$storyId");
                        exit;
                    } else {
                        // Nếu không thêm được bình luận, hiển thị thông báo lỗi
                        echo "Đã xảy ra lỗi khi thêm bình luận!";
                    }
                } else {
                    // Nếu không tìm thấy người dùng, hiển thị thông báo lỗi
                    echo "Không tìm thấy người dùng!";
                }
            } else {
                echo '<script>';
                echo 'alert("Vui lòng đăng nhập để thêm bình luận!");';
                echo 'window.location.href = "http://localhost:3000/app/views/user/login.php";'; // Chuyển hướng đến trang đăng nhập
                echo '</script>';
            }
        }
    }
    
    public function showComments($storyId) {
        // Khởi tạo đối tượng CommentModel
        $commentModel = new CommentModel();

        // Lấy danh sách bình luận theo storyId
        $comments = $commentModel->getCommentsByStoryId($storyId);

        // Hiển thị danh sách bình luận
        if (!empty($comments)) {
            echo '<div class="comment-list">';
            foreach ($comments as $comment) {
                echo '<div class="comment">';
                echo '<p>' . $comment['content'] . '</p>';
                // Hiển thị thông tin người dùng
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p>Chưa có bình luận nào.</p>';
        }
    }
}
$allcomment = new CommentController();
$comment = $allcomment->addComment();
?>