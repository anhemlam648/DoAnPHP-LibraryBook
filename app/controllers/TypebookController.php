<?php
require_once('C:/xampp/htdocs/webdoctruyen/config/database.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/models/StoryModel.php');
require_once('C:/xampp/htdocs/webdoctruyen/app/models/StoriestypeModel.php');

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
include('http://localhost:3000/app/views/admin/add.php');  
?>