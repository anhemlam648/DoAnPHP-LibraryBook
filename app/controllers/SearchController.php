<?php
require_once('C:/xampp/htdocs/webdoctruyen/app/models/StoryModel.php');

class SearchController
{
    private $storyModel;

    public function __construct()
    {
        $this->storyModel = new StoryModel();
    }

    public function index()
    {
        $result = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['search-input']) ? $_POST['search-input'] : '';

            if (!empty($name)) {
                //tìm kiếm hoàn hảo
                $result = $this->storyModel->searchName($name);
            }
        }

        include('C:/xampp/php/www/webdoctruyen/app/views/user/search.php');
    }
}

$searchController = new SearchController();
$searchController->index();
?>
