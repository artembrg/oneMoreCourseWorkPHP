<?php
session_start();
if (!isset($_SESSION['username'])) header('Location: login/');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="static/styles/base.css">
    <link rel="stylesheet" href="static/styles/main.css">
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/536-5366657_black-rose-clip-art-vector-rose-logo-png.png">
    <script type="text/javascript" src="static/js/confirmation.js"></script>
    <title>Учебный портал</title>
</head>
<body>
<header>
    <div class="header__ref">
        <a href="">
            <b class="header__ref-text">Главная</b>
        </a>
    </div>
    <div class="header__ref">
        <a href="articles/">
            <b class="header__ref-text">Статьи</b>
        </a>
    </div>
    <div class="header__ref">
        <?php if (isset($_SESSION['username'])): ?>
        <a href="javascript: confirmation('logout/')">
            <b class="header__ref-text">Выйти</b>
        </a>
        <?php else: ?>
        <a href="login/">
            <b class="header__ref-text">Войти</b>
        </a>
        <?php endif; ?>
    </div>
</header>
<div id="main">
    <div id="content">
        <p class="content__text">
            Добро пожаловать!
        </p>
        <p class="content__text">
            Вы попали на учебный портал про технологии динамичных веб-страниц, DHTML, асинхронного JavaScript, XML (AJAX), XMLHttpRequest и JSON.
        </p>
    </div>
</div>
</body>
</html>
