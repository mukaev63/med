<?php

$driver = 'postgresql';
$host = 'ec2-54-157-160-218.compute-1.amazonaws.com';
$db_name = 'ddv6k1fmqr6pa1';
$db_user = 'csavfuxtulbkcf';
$db_pass = '94c050246aa7dfe4d836813a55a20330d688cf748834ff6bde45375a5479b6ab';
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
