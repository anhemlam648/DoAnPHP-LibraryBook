<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Header content -->
    <?php include_once(__DIR__ . '/../partical/header.php'); ?>
    <link rel="stylesheet" href="/public/css/styleresult.css"> 
</head>
<body> 
    <!-- <div class="search-bar">
        <form action="/app/controllers/SearchController.php" method="post">
            <input type="text" name="search-input" id="search-input" placeholder="Tìm kiếm...">
            <button id="search-button" type="submit">Tìm kiếm</button>
        </form>
    </div>
     -->
    <div class="search-results-container">
        <?php
        foreach ($result as $story) {
            echo '<div class="search-result">';
            
            if (!empty($story['image']) && isset($story['id'])) {
                $imageData = base64_encode(file_get_contents($story['image']));
                $src = 'data:' . mime_content_type($story['image']) . ';base64,' . $imageData;
                echo '<img src="' . $src . '" alt="' . $story['title'] . '">';
                echo '<h3 class="result-title">' . $story['title'] . '</h3>';
                echo '<p class="result-author">Tác giả: ' . $story['author'] . '</p>';
                echo '<a class="read-more-link" href="/app/views/user/story.php?id=' . $story['id'] . '">Đọc thêm</a>';
            } else {
                echo '<p>Invalid data structure for search result (missing image or id): ' . print_r($story, true) . '</p>';
            }

            echo '</div>';
        }
        ?>
    </div>

    <footer>
        <!-- Footer content -->
        <?php include_once(__DIR__ . '/../partical/footer.php'); ?>
    </footer>
</body>
</html>
