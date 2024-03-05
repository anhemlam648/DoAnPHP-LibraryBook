<?php
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoriestypeModel.php');

class ListBookTypeAdminController
{
    public function index()
    {
        $typeModel = new StoriesTypeModel();
        $alltype = $typeModel->getAllTypes();
        echo '<table style="width:100%; border-collapse: collapse; margin-top: 20px; border: 2px solid #ddd;">';
        echo '<tr style="background-color: #FFFF33;">';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">ID</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Name</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Actions</th>';
        echo '</tr>';

        foreach ($alltype as $type) {
            echo '<tr>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['id'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['name'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">';
            echo '<a href="http://localhost:3000/app/controllers/UpdatetypeController.php?id=' . $type['id'] . 
                '&name=' . urlencode($type['name']) . 
                '" class="action-button update-button" style="display: inline-block; margin-right: 10px; padding: 8px 16px; border-radius: 20px; background-color: #0077cc; color: #fff; text-decoration: none;">Update</a>';
            echo '<a href="/app/controllers/DeletetypeController.php?id=' . $type['id'] . '" class="action-button delete-button" onclick="return confirm(\'Are you sure?\')" style="display: inline-block; padding: 8px 16px; border-radius: 20px; background-color: #ff3333; color: #fff; text-decoration: none;">Delete</a>';
            echo '</tr>';
        }

        echo '</table>';
    }
}
?>
