<?php
session_start();
if (!isset($_SESSION['username'])) header('Location: ../../login/');
if (isset($_POST['title']) and isset($_POST['content'])) {
    if (strlen($_POST['title']) > 4) {
        include_once '../../db_func/Articles.php';
        updateArticle($_POST['id'], $_POST['title'], $_POST['content']);
        header('Location: ../article/?id='.$_POST['id']);
    }
}
else if (isset($_GET['id'])):
    include_once '../../db_func/Articles.php';
    $article = getArticle($_GET['id']);
    if ($article !== false):
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../static/styles/base.css">
    <link rel="stylesheet" href="../../static/styles/new.css">
    <link rel="icon" href="https://www.pinclipart.com/picdir/big/536-5366657_black-rose-clip-art-vector-rose-logo-png.png">
    <script type="text/javascript" src="../../static/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../../static/js/confirmation.js"></script>
    <title>Учебный портал</title>
</head>
<body>
<header>
    <div class="header__ref">
        <a href="../../">
            <b class="header__ref-text">Главная</b>
        </a>
    </div>
    <div class="header__ref">
        <a href="../../articles/">
            <b class="header__ref-text">Статьи</b>
        </a>
    </div>
    <div class="header__ref">
        <?php if (isset($_SESSION['username'])): ?>
            <a href="javascript: confirmation('../../logout/')">
                <b class="header__ref-text">Выйти</b>
            </a>
        <?php else: ?>
            <a href="../../login/">
                <b class="header__ref-text">Войти</b>
            </a>
        <?php endif; ?>
    </div>
</header>
<div id="main">
    <div id="content">
        <div id="form">
            <form id="new_art" method="post" action="../update/">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <input id="title" type="text" name="title" minlength="5" maxlength="150" placeholder="Заголовок" value="<?php echo $article['title']?>" required><br>
                <textarea id="article_content" name="content" required>
                    <?php echo $article['content']?>
                </textarea>
                <br>
                <input id="new_submit" type="submit" name="login_submit" value="Обновить статью">
            </form>
            <script>
                CKEDITOR.replace('article_content', {
                    filebrowserUploadUrl: '../new/upload.php',
                    filebrowserUploadMethod: 'form'});
            </script>
        </div>
    </div>
</div>
</body>
</html>
    <?php
    else:
        header('HTTP/1.0 404 Not Found');
        ?>
        <h1>
            ОШИБКА 404.
        </h1>
    <?php
    endif;
else:
    header('HTTP/1.0 404 Not Found');
    ?>
    <h1>
        ОШИБКА 404.
    </h1>
<?php endif;?>