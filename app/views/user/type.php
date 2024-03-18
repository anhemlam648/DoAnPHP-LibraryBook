<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stories</title>
    <!-- Header content -->
    <?php include_once(__DIR__ . '/../partical/header.php'); ?>
    <link rel="stylesheet" href="/public/css/styletype.css"> 
</head>

<body> 
    <main>
        <?php
            require_once('C:/xampp/php/www/webdoctruyen/app/controllers/TypeController.php');
            $controller = new TypeController();
            $controller->index();
        ?>
    </main>
    <footer>
        <!-- Footer content -->
        <?php include_once(__DIR__ . '/../partical/footer.php'); ?>
    </footer>
</body>
</html>
