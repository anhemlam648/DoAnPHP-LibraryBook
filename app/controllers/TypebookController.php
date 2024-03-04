<?php
require_once('C:/xampp/php/www/webdoctruyen/config/database.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoryModel.php');
require_once('C:/xampp/php/www/webdoctruyen/app/models/StoriestypeModel.php');

class TypeBookController
{
    private $typeModel;

    public function __construct()
    {
        $this->typeModel = new StoriesTypeModel();
    }

    public function getAllTypes()
    {
        return $this->typeModel->getAllTypes();
    }
}

// Sử dụng
$typebookController = new TypeBookController();
$typeList = $typebookController->getAllTypes();
include('http://localhost:3000/app/views/admin/add.php');  // Change path accordingly
?>