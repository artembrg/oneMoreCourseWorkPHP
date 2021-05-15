<?php
session_start();
if (!isset($_SESSION['username'])) header('Location: ../login/');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../static/styles/base.css">
    <link rel="stylesheet" href="../static/styles/articles.css">
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/536-5366657_black-rose-clip-art-vector-rose-logo-png.png">
    <script type="text/javascript" src="../static/js/confirmation.js"></script>
    <title>Учебный портал</title>
</head>
<body>
<header>
    <div class="header__ref">
        <a href="../">
            <b class="header__ref-text">Главная</b>
        </a>
    </div>
    <div class="header__ref">
        <a href="">
            <b class="header__ref-text">Статьи</b>
        </a>
    </div>
    <div class="header__ref">
        <?php if (isset($_SESSION['username'])): ?>
            <a href="javascript: confirmation('../logout/')">
                <b class="header__ref-text">Выйти</b>
            </a>
        <?php else: ?>
            <a href="../login/">
                <b class="header__ref-text">Войти</b>
            </a>
        <?php endif; ?>
    </div>
</header>
<div id="main">
    <div id="content">
        <div id="content__head">
            <a href="new/">
                <h1>
                    Создать статью
                </h1>
            </a>
        </div>
        <?php
        include_once '../db_func/Articles.php';
        $articles = getAllArticles();
        foreach ($articles as $key=>$value):
        ?>
        <div class="article">
            <table>
                <tr>
                    <th>
                        <a href="update/?id=<?php echo $value['id'];?>">
                            <h5>
                                Обновить статью
                            </h5>
                        </a>
                    </th>
                    <th>
                        <a href="javascript: confirmation('delete/?id=<?php echo $value['id'];?>')">
                            <h5>
                                Удалить статью
                            </h5>
                        </a>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <a href="article/?id=<?php echo $value['id'];?>">
                            <h1>
                                <?php echo $value['title'];?>
                            </h1>
                        </a>
                    </th>
                </tr>
            </table>
        </div>
        <?php endforeach;?>
    </div>
</div>
</body>
</html>