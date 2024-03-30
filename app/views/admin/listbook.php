<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManagerBook</title>
    <?php include_once(__DIR__ . '/../partical/headerhome.php'); ?>
    <style>
    main {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .story {
        margin: 10px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        width: 300px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
    }

    .story img {
        max-width: 100%;
        border-radius: 8px;
    }

    .story p {
        margin: 5px 0;
        text-align: center;
    }

    .action-button {
        padding: 8px 16px;
        margin: 4px;
        border: none;
        border-radius: 20px;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
    }

    .update-button {
        background-color: #4CAF50;
        color: white;
    }

    .delete-button {
        background-color: #FF5733;
        color: white;
    }
    </style>
</head>

<body>
    <div style="display: flex; align-items: center; justify-content: center; margin-top: 20px;">
        <a href="http://localhost:3000/app/controllers/AddBookController.php"
            style="padding: 10px 10px; background-color: #FFCC00; color: #fff; text-decoration: none; border-radius: 4px; font-size: 16px; cursor: pointer; margin-right: 10px;">Thêm
            Sách</a>
    </div>
    <main>
        <?php
        require_once('C:/xampp/htdocs/webdoctruyen/app/controllers/ListbookAdminController.php');
        $controller = new ListBookAdminController();
        $controller->index();
        ?>
    </main>
</body>

</html>