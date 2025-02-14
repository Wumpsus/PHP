<?php
include_once 'db.php';

// Nieuwsberichten ophalen
$news = getNews();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwswebsite</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Nieuwswebsite</h1>
    </header>
    <main>
        <section class="news">
            <h2>Laatste nieuws:</h2>
            <div class="news-list">
                <?php foreach ($news as $article): ?>
                    <div class="news-item">
                        <h3><?php echo $article['title']; ?></h3>
                        <p><?php echo $article['content']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Nieuwswebsite, gemaakt door Michael Davelaar!</p>
    </footer>
</body>
</html>
