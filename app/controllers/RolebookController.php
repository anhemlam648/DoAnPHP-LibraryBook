<?php
require_once('C:/xampp/htdocs/webdoctruyen/config/database.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/models/RoleModel.php');

class RoleBookController
{
    private $roleModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
    }

    // public function index()
    // {
    //     $roleModel = new RoleModel();
    //     $usersWithRoleOne = $roleModel->getRolesWithRoleIdOne();
        
    //     if (!empty($usersWithRoleOne)) {
    //         // In giá trị role_id để kiểm tra
    //         echo $usersWithRoleOne[0]['role_id'];
    //         $_SESSION['role_id'] = $usersWithRoleOne[0]['role_id'];
    //         header('Location: http://localhost:3000/app/views/admin/home.php');
    //         exit();
    //     } else {
    //         header('Location: http://localhost:3000/app/views/admin/404.php');
    //         exit();
    //     }
    // }
    public function admin()
        {
            $roleModel = new RoleModel();
            $usersWithRoleOne = $roleModel->getRolesWithRoleIdOne();
            
            if (($usersWithRoleOne)) {
                header('Location: http://localhost:3000/app/views/admin/home.php');
                exit();
            } else {
                header('Location: http://localhost:3000/app/views/admin/404.php');
                exit();
            }
        }
}

// Sử dụng
$roleController = new RoleBookController();
$roleController->admin();
?>
