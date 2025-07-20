<?php
require "db.php";
$page = 0;

if(isset($_GET["page"])){
    $page = $_GET["page"];
}

$count = 4;

$db_news = R::findAll('news', "ORDER BY `date` DESC");
$news = array();
foreach ($db_news as $row) {
    $news[] = $row;
}

$first = current($news);
$page_count = floor(count($news) / $count);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_index.css">
    <title>News</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="header__content">
                <img class="header__logo" src="img/icons/logo.svg" alt="">
                <p>Галактический вестник</p>
            </div>
        </div>
        <div class="image-part">
            <div class="image-part__block" style="background-image:url('img/news/<?php echo $first->image; ?>');">
                <div class="image-part__text">
                    <h2><?php echo $first->title; ?></h2>
                    <p><?php echo $first->announce; ?></p>
                </div>
            </div>
        </div>
        <div class="news">
            <div class="news__header">
                <h1>Новости</h1>
            </div>
            <div class="news__container">
                <?php for($i = $page * $count; $i < ($page + 1) * $count; $i++) :?>
                <?php if($i >= count($news)) break; ?>
                    <div class="news__item">
                        <div class="news__date">
                            <p><?php echo date('d.m.Y', strtotime($news[$i]->date)); ?></p>
                        </div>
                        <div class="news__title">
                            <h2><?php echo $news[$i]->title; ?></h2>
                        </div>
                        <div class="news__description">
                            <p><?php echo $news[$i]->announce; ?></p>
                        </div>
                        <a href="news.php?id=<?php echo $news[$i]->id; ?>&page=<?php echo $page; ?>">
                            <div class="news__button">
                                <div class="news__button-content">
                                    <p>Подробнее</p>
                                    <img src="img/icons/Arrow.svg" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="news__navigation">
                <?php for($p = 0; $p <= $page_count; $p++) :?>
                <a href="?page=<?php echo $p; ?>">
                    <div class="news__page" <?php if ($p == $page){?>style="background-color: #841844;"<?php } ?>>
                        <p <?php if ($p == $page){?>style="color: white;"<?php } ?>><?php echo $p + 1; ?></p>
                    </div>
                </a>
                <?php endfor; ?>
                <a href="?page=<?php echo $page + 1; ?>">
                    <div class="news__arrow" <?php if ($page == $page_count){?>style="display: none;"<?php } ?>>
                        <img src="img/icons/PageArrow.svg" alt="">
                    </div>
                </a>
            </div>
        </div>
        <div class="footer">
            <hr>
            <p>© 2023 — 2412 «Галактический вестник»</p>
        </div>
    </div>
    <script src="js/index.js"></script>
</body>
</html>