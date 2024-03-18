<?php
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoryModel.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/CommentModel.php');
require_once('C:/xampp/php/www/webdoctruyen/app/controllers/CommentController.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/UserModel.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoriestypeModel.php');

class TypeController
{
    public function index()
    {
        // Lấy danh sách tất cả các loại truyện
        $typeModel = new StoriesTypeModel();
        $allTypes = $typeModel->getAllTypes();
    
        // Hiển thị form lọc
        echo '<div style="text-align: center;">';
        echo '<h2 style="margin-bottom: 20px;">Lọc truyện theo loại</h2>';
        echo '<form action="" method="get">';
        echo '<select name="type_id" style="padding: 10px; border-radius: 5px;">';
        echo '<option value="">Tất cả loại truyện</option>';
        foreach ($allTypes as $type) {
            // echo '<option value="' . $type['id'] . '">' . $type['name'] . '</option>';
            echo '<option value ="'.$type['id']. '"';
            if(isset($_GET['type_id']) && $_GET['type_id']== $type['id']){
                echo'selected';
                $selectedTypeName = $type['name'];
            }
            echo '>' . $type['name'] .'</option>';
        }
        echo '</select>';
        echo '<button type="submit" style="padding: 10px 20px; border-radius: 5px; background-color: #3498db; color: white; border: none; margin-left: 10px;">Lọc</button>';
        echo '</form>';
        if (isset($selectedTypeName)) {
            echo '<p style="margin-top: 10px;">Đã lọc theo loại: ' . $selectedTypeName . '</p>'; // Hiển thị tên loại truyện đã lọc
        }
        
        echo '</div>';
    
        // Kiểm tra xem người dùng đã chọn loại truyện hay chưa
        if (isset($_GET['type_id']) && !empty($_GET['type_id'])) {
            // Lấy danh sách truyện theo loại đã chọn
            $typeModel = new StoriesTypeModel();
            $allStories = $typeModel->getStoriesByTypeId($_GET['type_id']);
        } else {
            // lấy danh sách tất cả các truyện
            $storyModel = new StoryModel();
            $allStories = $storyModel->getAllStories();
        }
    
        // Hiển thị danh sách truyện
        echo '<div class="story-container" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 180px;">';
        foreach ($allStories as $story) {
            echo '<div class="story" style="background-color: #f0f0f0; border-radius: 10px; padding: 20px; margin: 10px;">';
            // Hiển thị thông tin truyện
            echo '<div class="story-content" style="text-align: center;">';
            if (!empty($story['image'])) {
                $imageData = base64_encode(file_get_contents($story['image']));
                $src = 'data:' . mime_content_type($story['image']) . ';base64,' . $imageData;
    
                echo '<img src="' . $src . '" alt="' . $story['title'] . '" style="border-radius: 10px; max-width: 100%; max-height: 200px; object-fit: cover; margin-bottom: 10px;">';
            }
            echo '<h3 class="story-title" style="margin-bottom: 5px; font-size: 1.5rem;">' . $story['title'] . '</h3>';
            echo '<p class="story-author" style="font-style: italic; margin-bottom: 20px;">Tác giả: ' . $story['author'] . '</p>';
            echo '<a class="read-more-link" href="/app/views/user/story.php?id=' . $story['id'] . '" style="text-decoration: none; background-color: #3498db; color: white; padding: 10px 20px; border-radius: 5px; margin-top: 10px;">Đọc thêm</a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }
    
    public function showStoryDetails($storyId)
    {
        $storyModel = new StoryModel();
        $storyDetails = $storyModel->getStoryById($storyId);

        echo '<h2 class="detail-heading">Chi tiết truyện</h2>';
        echo '<div class="story-details">';
        echo '<div class="story-info">';
        echo '<h3 class="story-title">Tên Truyện: ' . $storyDetails['title'] . '</h3>';
        echo '<p class="story-author">Tác giả: ' . $storyDetails['author'] . '</p>';
        echo '</div>';
        echo '<div class="story-image">';
        if (!empty($storyDetails['image'])) {
            $imageData = base64_encode(file_get_contents($storyDetails['image']));
            $src = 'data:' . mime_content_type($storyDetails['image']) . ';base64,' . $imageData;

            echo '<img src="' . $src . '" alt="' . $storyDetails['title'] . '">';
        }
        echo '</div>';
        echo '<div class="story-description">';
        echo '<p>Mô tả: ' . $storyDetails['description'] . '</p>';
        echo '<a class="read-more-link" href="/app/views/user/read.php?id=' . $storyDetails['id'] . '">Đọc truyện</a>';
        echo '</div>';
        echo '</div>';
    }

    public function showStoryRead($storyId)
    {
        $storyModel = new StoryModel();
        $storyRead = $storyModel->getStoryById($storyId);
    
        // Hiển thị phần đọc truyện
        echo '<div class="story-container">';
        echo '<h2 class="detail-heading">Đọc Truyện</h2>';
        echo '</div>';
        echo '<div class="story-image">';
        if (!empty($storyRead['image'])) {
            $imageData = base64_encode(file_get_contents($storyRead['image']));
            $src = 'data:' . mime_content_type($storyRead['image']) . ';base64,' . $imageData;
    
            echo '<img src="' . $src . '" alt="' . $storyRead['title'] . '">';
        }
        echo '</div>';
        echo '<div class="story-description">';
        echo '<p>Nội dung: ' . $storyRead['content'] . '</p>';
        // Thêm các chi tiết khác cần hiển thị
        echo '</div>';
    
        // Hiển thị phần bình luận
        echo '<div class="comment-section">';
        echo '<h2 class="comment-heading">Bình Luận</h2>';
        echo '<form class="comment-form" method="post" action="#">'; 
        echo '<input type="hidden" name="story_id" value="' . $storyId . '">';
        echo '<textarea name="comment_content" placeholder="Nhập bình luận của bạn"></textarea>';
        echo '<button type="submit">Gửi</button>';
        echo '</form>';
    
        // Hiển thị danh sách các bình luận
        $commentModel = new CommentModel();
        $comments = $commentModel->getCommentsByStoryId($storyId);
        if (!empty($comments)) {
            echo '<div class="comment-list">';
            foreach ($comments as $comment) {
                echo '<div class="comment">';
                // Lấy thông tin người dùng từ UserModel
                $userModel = new UserModel();
                $user = $userModel->getUserById($comment['user_id']);
                if ($user) {
                    echo '<p><strong>' . $user['name'] . '</strong>: ' . $comment['content'] . '</p>';
                } else {
                    echo '<p>' . $comment['content'] . '</p>';
                }
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p class="no-comments">Chưa có bình luận nào.</p>';
        }        
        echo '</div>';
    }
}
?>
