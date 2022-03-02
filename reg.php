<?php
include('path.php');
include("app/controllers/users.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация врача</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<div class="container reg_form">
    <form action="reg.php" method="post" class="row justify-content-center">
        <h2>Регистрация врача</h2>
        <div class="mb-3 col-12 col-md-4">
            <label for="formInput" class="form-label">Логин нового врача</label>
            <input type="text" name="login" class="form-control" id="formInput" placeholder="Введите логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formInputEmail" class="form-label">Email</label>
            <input type="email" name="mail" class="form-control" id="formInputEmail" placeholder="Введите email">
        </div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formInputPass" class="form-label">Пароль</label>
            <input type="password" name="pass" class="form-control" id="formInput" placeholder="Введите пароль">
        </div>
        <div class="mb-3 col-12 col-md-4">
            <input type="submit" class="btn btn-primary" name="button-reg-doctor">
        </div>
    </form>
</div>
</body>
</html>
