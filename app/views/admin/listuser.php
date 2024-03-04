<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListUser</title>
    <?php include_once(__DIR__ . '/../partical/headerhome.php'); ?>
</head>

<body>
    <main>
        <?php
        require_once('C:/xampp/php/www/webdoctruyen/app/controllers/ListuserController.php');
        $controller = new ListUserController();
        $controller->index();
        ?>
    </main>
</body>
</html>
