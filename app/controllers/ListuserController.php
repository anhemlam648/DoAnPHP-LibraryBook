<?php
require_once('C:/xampp/php/www/webdoctruyen/app/models/UserModel.php');

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
        echo '</tr>';

        foreach ($alluser as $type) {
            echo '<tr>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['id'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['username'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['name'] . '</td>';
            echo '<td style="padding: 10px; border: 1px solid #ddd;text-align: center;">' . $type['email'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
}
?>
