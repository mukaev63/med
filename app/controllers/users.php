<?php

include("app/db/db.php");

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg-doctor'])) {
    $login = $_POST['login'];
    $email = $_POST['mail'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $doctor = 1;

    $param = [
        'doctor' => $doctor,
        'username' => $login,
        'email' => $email,
        'password' => $pass,
    ];

    insert("users", $param);
    header('location: ' . BASE_URL . '/');

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $login = $_POST['login'];
    $email = $_POST['mail'];
    $title = $_POST['title'];
    $descr = $_POST['descr'];
    $id_doctor = $_POST['id_doctor'];
    $medicines = $_POST['medicines'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $doctor = 0;

    $param1 = [
        'id_doctor' => $id_doctor,
        'title' => $title,
        'descr' => $descr,
        'medicines' => $medicines,
    ];
    $post_id = insert("cards", $param1);

    $param = [
        'doctor' => $doctor,
        'username' => $login,
        'email' => $email,
        'password' => $pass,
        'card_id' => $post_id,
     ];

    insert("users", $param);
    header('location: ' . BASE_URL . 'doctor-page.php');

}

// Login
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $existence = selectOne('users', ['email' => $email]);
    if($existence && password_verify($pass, $existence['password'])) {
        $_SESSION['id'] = $existence['id'];
        $_SESSION['login'] = $existence['username'];
        $_SESSION['doctor'] = $existence['doctor'];

        if ($_SESSION['doctor']) {
            header('location: ' . BASE_URL . "doctor-page.php");
        } else {
            header('location: ' . BASE_URL . "patient-page.php");
        }
    }
}

// Update
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectOne('cards', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post["title"];
    $descr = $post["descr"];
    $medicines = $post["medicines"];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-edit'])) {
    $id = $_POST['id'];

    $title = trim($_POST['title']);
    $descr = trim($_POST['descr']);
    $medicines = trim($_POST['medicines']);

    $post = [
        'id_doctor' => $_SESSION['id'],
        'title' => $title,
        'descr' => $descr,
        'medicines' => $medicines,
    ];

    $post = update('cards', $id, $post);
    header('location: ' . BASE_URL . '/doctor-page.php');
}

// Update
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete("cards", $id);
    header('location: ' . BASE_URL . '/doctor-page.php');
}

