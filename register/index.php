<?php
include_once '../db_func/Users.php';
session_start();
if (isset($_SESSION['username'])) header('Location: ../');
if (isset($_POST['login']) and isset($_POST['password'])) {
    if (checkRegisteredUser($_POST['login']) and strlen($_POST['password']) > 7) {
        header('Location: ../login/');
        registerUser($_POST['login'], $_POST['password']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../static/styles/base.css">
    <link rel="stylesheet" href="../static/styles/login.css">
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
        <a href="../articles/">
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
        <div id="form">
            <form id="login" method="post" action="">
                <input id="login_text" type="text" name="login" minlength="5" maxlength="20" placeholder="Логин" required><br>
                <input id="password" type="password" name="password" minlength="8" placeholder="Пароль" required><br>
                <input id="login_submit" type="submit" name="login_submit" value="Зарегистрироваться">';
            </form>
        </div>
    </div>
</div>
</body>
</html>