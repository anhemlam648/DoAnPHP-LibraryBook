<?php
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoryModel.php');

class ListBookAdminController
{
    public function index()
    {
        $storyModel = new StoryModel();
        $allStories = $storyModel->getAllStories();
        echo '<table style="width:100%; border-collapse: collapse; margin-top: 20px; border: 2px solid #ddd;">';
        echo '<tr style="background-color: #FFFF33;">';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">ID</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Title</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Description</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Author</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Type_id</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Content</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Actions</th>'; // New column for actions
        echo '</tr>';

        foreach ($allStories as $story) {
            echo '<tr>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $story['id'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $story['title'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $story['description'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $story['author'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $story['type_id'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $story['content'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">';
            echo '<a href="http://localhost:3000/app/controllers/UpdatebookController.php?id=' . $story['id'] . 
            '&title=' . urlencode($story['title']) . 
            '&description=' . urlencode($story['description']) . 
            '&author=' . urlencode($story['author']) . 
            '&type_id=' . $story['type_id'] . 
            '&content=' . urlencode($story['content']) . 
            '" class="action-button update-button">Update</a>';
            echo '<a href="/app/controllers/DeleteBookController.php?id=' . $story['id'] . '" class="action-button delete-button" onclick="return confirm(\'Are you sure?\')">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
}
?>
