<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TypeBook</title>
    <?php include_once(__DIR__ . '/../partical/headerhome.php'); ?>
</head>

<body>
    <div style="display: flex; align-items: center; justify-content: center; margin-top: 20px;">
        <a href="http://localhost:3000/app/views/admin/addtype.php"
            style="padding: 10px 10px; background-color: #FFCC00; color: #fff; text-decoration: none; border-radius: 4px; font-size: 16px; cursor: pointer; margin-right: 10px;">Thêm
            Loại</a>
    </div>
    <main>
        <?php
        require_once('C:/xampp/htdocs/webdoctruyen/app/controllers/ListbooktypeController.php');
        $controller = new ListBookTypeAdminController();
        $controller->index();
        ?>
    </main>
</body>
</html>
