<?php
require "db.php";
$page = $_GET["page"];
$id = $_GET["id"];

$db_news = mysqli_query($conn, "SELECT * FROM news WHERE id = " . $id);
$news = mysqli_fetch_assoc($db_news);
$title = $news['title'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_news.css">
    <title>News</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="header__content">
                <img class="header__logo" src="img/icons/logo.svg" alt="">
                <p>Галактический вестник</p>
            </div>
            <hr>
        </div>
        <div class="structure">
            <a class="structure__main" href="index.php">Главная</a>
            <p class="structure__delimiter">/</p>
            <p class="structure__current"><?php echo $title; ?></p>
        </div>
        <div class="news">
            <div class="news__header">
                <h1><?php echo $title; ?></h1>
            </div>
            <div class="news__container">
                <div class="news__item">
                    <div class="news__date">
                        <p><?php echo date('d.m.Y', strtotime($news['date'])); ?></p>
                    </div>
                    <div class="news__title">
                        <h2><?php echo $news['announce']; ?></h2>
                    </div>
                    <div class="news__description">
                        <p><?php echo $news['content']; ?></p>
                    </div>
                    <a href="index.php?page=<?php echo $page; ?>">
                        <div class="news__button" id="button">
                            <div class="news__button-content">
                                <img src="img/icons/Arrow.svg" alt="" id="buttonImg">
                                <p id="buttonText">Назад к новостям</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="news__image" style="background-image:url('img/news/<?php echo $news['image']; ?>');">
                </div>
            </div>
            <div class="footer">
                <hr>
                <p>© 2023 — 2412 «Галактический вестник»</p>
            </div>
        </div>
    </div>
    <script src="js/news.js"></script>
</body>
</html>