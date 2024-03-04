<?php
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoryModel.php');

class DefaultController
{
    public function index()
    {
        $storyModel = new StoryModel();
        $allStories = $storyModel->getAllStories();
    
        echo '<h2>Danh sách truyện</h2>';
        echo '<div class="story-container">'; 
    
        foreach ($allStories as $story) {
            echo '<div class="story">';
            if (!empty($story['image'])) {
                $imageData = base64_encode(file_get_contents($story['image']));
                $src = 'data:' . mime_content_type($story['image']) . ';base64,' . $imageData;
    
                echo '<img src="' . $src . '" alt="' . $story['title'] . '">';
            }
            echo '<h3 class="story-title">' . $story['title'] . '</h3>';
            echo '<p class="story-author">Tác giả: ' . $story['author'] . '</p>';
            echo '<a class="read-more-link" href="/app/views/user/story.php?id=' . $story['id'] . '">Đọc thêm</a>';
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
        // Thêm các chi tiết khác cần hiển thị
        echo '</div>';
        echo '</div>';
    }

    public function showStoryRead($storyId)
    {
        $storyModel = new StoryModel();
        $storyRead = $storyModel->getStoryById($storyId);

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
        echo '</div>';
    }
}
?>
