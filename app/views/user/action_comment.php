<?php
require_once('C:/xampp/htdocs/webdoctruyen/app/controllers/CommentController.php');

// Khởi tạo đối tượng CommentController
$commentController = new CommentController();

// Gọi phương thức addComment nếu có dữ liệu được gửi từ form
$commentController->addComment();
?>