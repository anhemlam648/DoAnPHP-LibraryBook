<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Header content -->
    <?php include_once(__DIR__ . '/../partical/header.php'); ?>
    <link rel="stylesheet" href="/public/css/style.css"> 
</head>

<body> 
     <!-- Thanh tìm kiếm
     <div class="search-bar">
    <form action="/app/controllers/SearchController.php" method="post">
        <input type="text" name="search-input" id="search-input" placeholder="Tìm kiếm...">
        <button id="search-button" type="submit">Tìm kiếm</button>
    </form> -->
    </div>
    <main>
        <?php
            require_once('C:/xampp/php/www/webdoctruyen/app/controllers/DefaultController.php');
            $controller = new DefaultController();
            $controller->index();
        ?>
    </main>
    <footer>
        <!-- Footer content -->
        <?php include_once(__DIR__ . '/../partical/footer.php'); ?>
    </footer>
</body>
</html>
