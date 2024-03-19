<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$title = urldecode(isset($_GET['title']) ? $_GET['title'] : '');
$description = urldecode(isset($_GET['description']) ? $_GET['description'] : '');
$image = isset($_GET['image']) ? urldecode($_GET['image']) : '';
$author = isset($_GET['author']) ? urldecode($_GET['author']) : '';
$type_id = isset($_GET['type_id']) ? $_GET['type_id'] : '';
$content = urldecode(isset($_GET['content']) ? $_GET['content'] : '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Sách</title>
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
        <h2>Cập Nhật Sách</h2>
        <form action="/app/controllers/UpdateBookController.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $title; ?>" required>

            <label for="description">Description:</label>
            <textarea name="description" rows="4" required><?php echo $description; ?></textarea>
                <?php
                $image = isset($_GET['image']) ? urldecode($_GET['image']) : '';
                // Đường dẫn của hình ảnh
                $currentImage = ($image !== '') ? $image : '/public/image'; 
                ?>
                <label for="image" class="custom-file-upload">Chọn Ảnh</label>
                <input type="file" name="image" id="image" accept="image/*">
                <?php if ($currentImage !== '/public/image'): ?>
                    <img src="<?php echo $currentImage; ?>" alt="Hình ảnh hiện tại" style="max-width: 100%; margin-top: 10px;">
                <?php endif; ?>

            <label for="author">Author:</label>
            <input type="text" name="author" value="<?php echo $author; ?>" required>

            <label for="type_id">Type ID:</label>
            <select name="type_id">
                <?php foreach ($typeList as $type): ?>
                <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="content">Content:</label>
            <textarea name="content" rows="4" required><?php echo $content; ?></textarea>

            <button type="submit">Cập Nhật Sách</button>
            <a href="/app/views/admin/listbook.php" style="display: inline-block; padding: 10px 20px; border-radius: 8px; background-color: #FFD700; color: #fff; font-size: 16px; text-decoration: none; margin-top: 10px; border: none; cursor: pointer; transition: background-color 0.3s ease;">Back</a>
        </form>
    </div>
</body>

</html>
