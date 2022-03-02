<?php
    include('path.php');
    include ('app/controllers/users.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/adaptive.css">
</head>
<body>
<?php
// include('./app/include/header.php');
?>


    <section class="wrapper">
        <div class="form-wrapper">
            <div class="role-wrapper">
                <div class="role-login active">
                    <img src="./assets/images/patient.png" alt="" class="login-type">
                    <p class="role-login-text">Я пациент</p>
                </div>
                <div class="role-login">
                    <img src="./assets/images/doctor.png" alt="" class="login-type">
                    <p class="role-login-text">Я врач</p>
                </div>
                <p class="role-greeting"></p>
            </div>
        <form action="" method="post">
            <input name="email" type="text" placeholder="Введите email" required>
            <input name="pass" type="password" placeholder="Введите пароль" required>
            <input type="submit" value="Войти" name="button-log">
        </form>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
