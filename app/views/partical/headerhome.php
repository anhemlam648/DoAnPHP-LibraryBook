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
    </style>
</head>
<body>
    <div class="header-container">
    <h1 style="text-align: center;">Trang Quản Lý</h1>
    </div>
    <nav>
        <a href="/app/views/admin/home.php">Trang chủ</a>
        <a href="/app/views/admin/listbook.php">Quản lý sách</a>
        <a href="/app/views/admin/listbooktype.php">Quản lý loại sách</a>
        <a href="/app/views/admin/listuser.php">Quản lý người dùng</a>
        <a href="#">Liên hệ</a>
    </nav>
</body>

</html>
