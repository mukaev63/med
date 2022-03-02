<?php
include('path.php');
include("app/controllers/users.php");
$user = selectOne("users", ["id" => $_SESSION["id"]]);
$card = selectOne("cards", ["id" => $user["card_id"]]);
$doc = selectOne("users", ["id" => $card["id_doctor"]]);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет пациента</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/patient-page.css">
    <link rel="stylesheet" href="./assets/css/adaptive.css">
</head>
<body>
    <header>
        <?php include("./app/include/header.php"); ?>
    </header>
    <h1>Личный кабинет пациента</h1>
    <main class="d-flex justify-content-center">
        <div class="card" style="width: 30rem; margin-top: 10px; padding: 20px;">
            <img class="w-50" style="margin: auto" src="./assets/images/patient.png" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-wrap">
                <h5 class="card-title w-100"><?php echo $user["username"] ?></h5>
                <p class="card-text w-100"><strong>Болезнь:</strong> <?php echo $card["title"] ?></p>
                <p class="card-text w-100"><strong>О болезни:</strong>  <?php echo $card["descr"] ?></p>
                <p class="card-text w-100"><strong>Лекарства:</strong>  <?php echo $card["medicines"] ?></p>
                <p class="card-text w-100"><strong>Лечащий врач:</strong> <?php echo $doc["username"] ?></p>
<!--                <a href="#" class="btn btn-primary">Перейти на страницу</a>-->
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
