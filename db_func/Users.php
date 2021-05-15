<?php

include_once 'db_connect.php';

function registerUser($username, $password) {
    $db = connectToDB();
    $result = $db->prepare('INSERT INTO users (username, password_hashed) 
        VALUES (:username, :password_hashed)');
    $result->bindParam(':username', $username, PDO::PARAM_STR);
    $password_hashed = hash('sha256', $password);
    $result->bindParam(':password_hashed', $password_hashed, PDO::PARAM_STR);
    $result->execute();
    return true;
}

function checkRegisteredUser($username) {
    $db = connectToDB();
    $result = $db->prepare('SELECT * FROM users WHERE username = :username');
    $result->bindParam(':username', $username, PDO::PARAM_STR);
    $result->execute();
    $result = $result->fetch();
    if ($result === false and strlen($username) > 4) return true;
    else return false;
}

function userValidation($username, $password) {
    $db = connectToDB();
    $result = $db->prepare('SELECT * FROM users WHERE username = :username AND 
        password_hashed = :password_hashed');
    $result->bindParam(':username', $username, PDO::PARAM_STR);
    $password_hashed = hash('sha256', $password);
    $result->bindParam(':password_hashed', $password_hashed, PDO::PARAM_STR);
    $result->execute();
    $result = $result->fetch();
    if ($result === false) return false;
    else return true;
}