<?php
include('path.php');
include("app/controllers/users.php");

$user_id = $_SESSION["id"];
$cards = selectAll("cards", ["id_doctor" => $_SESSION["id"]]);
$posts = selectAllFromUsersWithUsers("cards", "users", $user_id);
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="./assets/css/doctor-page.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/patient-page.css">
    </head>
    <body>
    <?php include("./app/include/header.php"); ?>
    <div class="container" style="background-color: white;">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button style="margin-top: 10px;" class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Редактирование пациента</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container reg_form">
                    <form action="reg.php" method="post" class="row">
                        <input type="hidden" name="id" value="<?=$id ?>">
                        <h2 class="col-12">Редактирование пациента</h2>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="formInputPass" class="form-label">Болезнь</label>
                            <input value="<?=$title ?>" type="text" name="title" class="form-control"  placeholder="Введите болезнь">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="formInputPass" class="form-label">О Болезни</label>
                            <input value="<?=$descr ?>" type="text" name="descr" class="form-control" placeholder="Введите болезнь">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="formInputPass" class="form-label">Медикаменты</label>
                            <input value="<?=$medicines ?>" type="text" name="medicines" class="form-control" placeholder="Введите болезнь">
                        </div>

                        <input type="hidden" name="id_doctor" value="<?php echo $_SESSION["id"]?>">

                        <div class="mb-3 col-12 col-md-9">
                            <input type="submit" class="btn btn-primary" name="button-edit" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container reg_form">
                    <form action="reg.php" method="post" class="row">
                        <h2 class="col-12">Регистрация пациента</h2>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="formInput" class="form-label">Логин нового пациента</label>
                            <input type="text" name="login" class="form-control" id="formInput" placeholder="Введите логин">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="formInputEmail" class="form-label">Email</label>
                            <input type="email" name="mail" class="form-control"  placeholder="Введите email">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="formInputPass" class="form-label">Пароль</label>
                            <input type="password" name="pass" class="form-control" placeholder="Введите пароль">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="formInputPass" class="form-label">Болезнь</label>
                            <input type="text" name="title" class="form-control"  placeholder="Введите болезнь">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="formInputPass" class="form-label">О Болезни</label>
                            <input type="text" name="descr" class="form-control" placeholder="Введите болезнь">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="formInputPass" class="form-label">Медикаменты</label>
                            <input type="text" name="medicines" class="form-control" placeholder="Введите болезнь">
                        </div>

                        <input type="hidden" name="id_doctor" value="<?php echo $_SESSION["id"]?>">

                        <div class="mb-3 col-12 col-md-9">
                            <input type="submit" class="btn btn-primary" name="button-reg">
                        </div>
                    </form>
                    <div class="cards-wrapper d-flex flex-wrap">
                        <?php foreach ($posts as $key => $post): ?>
                            <div class="card" style="width: 18rem; margin: 10px 0;margin-right: 50px; padding: 20px;">
                                <img src="./assets/images/patient.png" class="card-img-top w-50 m-auto" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php
                                        echo $post["username"];
                                        ?></h5>
                                    <p class="card-text"><strong>Болезнь:</strong> <?php echo $post["title"]; ?> </p>
                                    <p class="card-text"><strong>О болезни:</strong>  <?php echo $post["descr"]; ?></p>
                                    <p class="card-text"><strong>Медикаменты:</strong> <?php echo $post["medicines"]; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    </body>
    </html>
<?php
