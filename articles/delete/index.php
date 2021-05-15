<?php
session_start();
if (!isset($_SESSION['username'])) header('Location: ../../login/');
if (isset($_GET['id'])) {
    header('Location: ../');
    include_once '../../db_func/Articles.php';
    deleteArticle($_GET['id']);
}
else header('Location: ../');