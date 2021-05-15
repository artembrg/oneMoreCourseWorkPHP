<?php

function connectToDB()
{
    include_once 'db_config.php';
    $conf_data = conf();
    $first_param = 'mysql:host='.$conf_data['host'].';dbname='.$conf_data['dbname'];
    return new PDO($first_param, $conf_data['user'], $conf_data['password']);
}