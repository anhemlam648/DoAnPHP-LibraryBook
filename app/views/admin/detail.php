<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$username = urldecode(isset($_GET['username']) ? $_GET['username'] : '');
$name = urldecode(isset($_GET['name']) ? $_GET['name'] : '');
$email = urldecode(isset($_GET['email']) ? $_GET['email'] : '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DetailsUser</title>
    <?php include_once(__DIR__ . '/../partical/headerhome.php'); ?>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    div {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    h2 {
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 80%;
        max-width: 400px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        margin-top: 10px;
        color: #555;
    }

    input,
    textarea,
    select,
    button {
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 8px;
        width: 100%;
        box-sizing: border-box;
    }

    button {
        background-color: #FFD700;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
        border: none;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #FFA500;
    }
    </style>
</head>

<body>
    <div>
        <form action="/app/controllers/ListuserController.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>" required>
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required>
            <label for="name">Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>" required>
            <div>
            <a href="/app/views/admin/listuser.php" style="display: inline-block; margin-right: 10px; padding: 8px 16px; border-radius: 20px; background-color: #0077cc; color: #fff; text-decoration: none;">Back</a>
            </div>
        </form>
    </div>
</body>

</html>