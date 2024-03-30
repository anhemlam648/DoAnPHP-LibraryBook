<?php
require_once('C:/xampp/htdocs/webdoctruyen/app/models/UserModel.php');

class ListUserController
{
    public function index()
    {
        $userModel = new UserModel();
        $alluser = $userModel->getAllUsers();
        echo '<table style="width:100%; border-collapse: collapse; margin-top: 20px; border: 2px solid #ddd;">';
        echo '<tr style="background-color: #FFFF33;">';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">ID</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Username</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Name</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Email</th>';
        echo '<th style="padding: 10px; border: 1px solid #ddd;">Actions</th>'; 
        echo '</tr>';

        foreach ($alluser as $type) {
            echo '<tr>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['id'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['username'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['name'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['email'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd; text-align: center;">';
            echo '<a href="http://localhost:3000/app/views/admin/detail.php?id='.  $type['id'] . 
            '&username=' . urlencode($type['username']) . 
            '&name=' . urlencode($type['name']) . 
            '&email=' . urlencode($type['email']) .  
            '" class="action-button update-button" style="display: inline-block; margin-right: 10px; padding: 8px 16px; border-radius: 20px; background-color: #0077cc; color: #fff; text-decoration: none;">Details</a>';
            echo '<a href="/app/controllers/DeleteuserController.php?id=' . $type['id'] . '" class="action-button delete-button" onclick="return confirm(\'Are you sure?\')" style="display: inline-block; padding: 8px 16px; border-radius: 20px; background-color: #ff3333; color: #fff; text-decoration: none;">Delete</a>';
            echo '</tr>';
        }

        echo '</table>';
    }
}
?>
