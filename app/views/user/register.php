<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url('https://wallpapers.com/images/featured/ultra-hd-wazf67lzyh5q7k32.jpg');
        }

        .registration-container {
            width: 300px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        p {
            text-align: center;
            color: #888;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <h1>Đăng Ký</h1>
        <form method="post" action="app/controllers/RegistrationController.php">
            <?php if (isset($registrationMessage)) : ?>
                <p style="color: green; text-align: center;"><?php echo $registrationMessage; ?></p>
            <?php endif; ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="name" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Đăng Ký</button>
        </form>
        <p>Already have an account? <a href="/app/views/user/login.php">Đăng Nhập</a></p>
    </div>
</body>
</html>
