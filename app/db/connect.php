<?php

$driver = 'postgresql';
$host = 'ec2-54-83-21-198.compute-1.amazonaws.com';
$db_name = 'd1e96jcbqukpke';
$db_user = 'eabzomaiwwtqsv';
$db_pass = '1d5850829323a5c4319d1cc7bdcbd9f219a95f43a192f66de957f0b7ddbd7910';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user, $db_pass, $options
    );
} catch (PDOException $i) {
    die("Ошибка подключение к БД");
}
