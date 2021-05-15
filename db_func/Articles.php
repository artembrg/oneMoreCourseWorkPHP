<?php

include_once 'db_connect.php';

function getAllArticles()
{
    $db = connectToDB();
    $result = $db->prepare('SELECT id, title FROM articles ORDER BY id');
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $i = 0;
    $articles = array();
    $row = $result->fetch();
    while ($row) {
        $articles[$i]['id'] = $row['id'];
        $articles[$i]['title'] = $row['title'];
        $i++;
        $row = $result->fetch();
    }
    return $articles;
}

function addArticle($title, $content) {
    $db = connectToDB();
    $result = $db->prepare('SELECT id FROM articles ORDER BY id DESC LIMIT 1');
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $id = $result->fetch();
    if ($id === false) $id = 1;
    else $id = $id['id'] + 1;
    $result = $db->prepare('INSERT INTO articles (title, content, id) VALUES
        (:title, :content, :id)');
    $result->bindParam(':title', $title, PDO::PARAM_STR);
    $result->bindParam(':content', $content, PDO::PARAM_STR);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return true;
}

function getArticle($id) {
    $db = connectToDB();
    $result = $db->prepare('SELECT title, content FROM articles WHERE id = :id');
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);
    return $result->fetch();
}

function deleteArticle($id) {
    $db = connectToDB();
    $result = $db->prepare('DELETE FROM articles WHERE id = :id');
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return true;
}

function updateArticle($id, $title, $content) {
    $db = connectToDB();
    $result = $db->prepare('UPDATE articles SET title = :title, content = :content WHERE id = :id');
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->bindParam(':title', $title, PDO::PARAM_STR);
    $result->bindParam(':content', $content, PDO::PARAM_STR);
    $result->execute();
    return true;
}