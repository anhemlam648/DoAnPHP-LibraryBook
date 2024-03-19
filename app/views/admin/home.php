<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include_once(__DIR__ . '/../partical/headerhome.php'); ?>
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .back-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease; 
        }
        .back-btn:hover {
            background-color: #297fb8; 
        }
        .intro-container {
            margin-top: 50px;
            text-align: center;
            padding: 20px;
        }
        .intro-container h1 {
            color: #333;
        }
        .intro-container p {
            color: #666;
        }
        .image-container {
            text-align: center;
            margin-top: 20px;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <a href="http://localhost:3000/app/views/user/index.php" class="back-btn">Quay lại trang chính</a>
    <div class="intro-container">
        <h1>Chào mừng đến với trang quản trị Admin</h1>
        <p>Đây là nơi để bạn quản lý các tác vụ và nội dung của trang web.</p>
    </div>
    <div class="image-container">
        <img src="/public/png/78948.png" alt="Ảnh minh họa">
    </div>
</body>
</html>
