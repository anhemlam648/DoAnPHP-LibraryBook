<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #333;
        padding: 10px 20px;
        color: white;
    }

    nav {
        display: flex;
        justify-content: space-around;
        background-color: #444;
        padding: 10px 0;
    }

    nav a {
        text-decoration: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    nav a:hover {
        background-color: #555;
    }

    .login-info {
        color: #fff;
        display: flex;
        align-items: center;
        position: relative;
    }

    .login-info a {
        color: #fff;
        text-decoration: none;
        margin-left: 10px;
        font-weight: bold;
        font-size: 14px;
        transition: color 0.3s;
    }

    .login-info a:hover {
        color: #ffd700;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #555;
        /* Updated background color to gray */
        min-width: 100px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: 30px;
        left: 0;
        border-radius: 5px;
    }

    .login-info:hover .dropdown-content {
        display: flex;
        flex-direction: column;
        position: absolute;
        top: 100%;
        left: 0;
    }

    .dropdown-content a {
        color: white;
        padding: 8px;
        text-decoration: none;
        display: block;
        border-radius: 5px;
    }

    .dropdown-content a:hover {
        background-color: #333;
    }
    </style>
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
        <a href="#">Thư viện</a>
        <a href="#">Tin tức</a>
        <a href="#">Liên hệ</a>
    </nav>
</body>
</html>