<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/styleheader.css"> 
    <title>Header</title>
</head>

<body>
    <div class="header-container">
        <h1>Nhà Sách Của Bạn</h1>
        <div class="login-info">
            <?php
            session_start();
            if (isset($_SESSION['users'])) {
                echo $_SESSION['users'] . " <div class='dropdown-content'><a href='/app/controllers/RolebookController.php'>ADMIN</a> | <a href='http://localhost:3000/app/views/user/logout.php'>Đăng xuất</a></div>";
            } else {
                echo "<a href='http://localhost:3000/app/views/user/login.php'>Đăng nhập</a>";
            }
            ?>
        </div>
    </div>
    <nav>
        <a href="/app/views/user/index.php">Trang chủ</a>
        <a href="/app/views/user/type.php">Thư viện</a>
        <a href="#">Tin tức</a>
        <a href="#">Liên hệ</a>
           <!-- Thanh tìm kiếm-->
         <div class="search-bar">
            <form action="/app/controllers/SearchController.php" method="post">
                <input type="text" name="search-input" id="search-input" placeholder="Tìm kiếm...">
                <button id="search-button" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </nav>
</body>

</html>