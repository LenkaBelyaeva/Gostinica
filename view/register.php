<?php

require_once('../autoload/autoloadForInFile.php');

use Model\Klient;

$klient = new Klient();

if (!$_POST == []):
    if ($klient->register($_POST)) {
        header('Location: http://Gostinica/', true, 301);
        exit();
    } else {
        $validate = true;
    }
endif;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
    <div class="container" style="margin-top: 20px" id="glavnai">
        <div class="logo">
            <a href="index.php"><img src="../img/logo.jpg" alt="Grand Atlee"></a>
        </div>
        <!--            <nav>-->
        <!--               <ul>-->
        <!--                    <li><a href="#glavnai">Главная</a></li>-->
        <!--                    <li><a href="#avantages">Удобства</a></li>-->
        <!--                    <li><a href="#nomera">Номера</a></li>-->
        <!--                    <li><a href="#predlogi">Предложения</a></li>-->
        <!--                    <li><a href="#contact">Контакты</a></li>-->
        <!--                </ul>-->
        <!--            </nav>-->
        <div class="broninom_button">
            <!--               <button><a href="Nomer/form.php">Забронировать</a></button>-->
            <a style="cursor: pointer" href="login.php">
                <button>Войти</button>
            </a>
            <a style="cursor: pointer" href="">
                <button>Регистрация</button>
            </a>
        </div>
        <div class="header_contacts">
            <a href="#">+7 (910) 018-35-44</a>
            <p>Обратная связь</p>
        </div>
    </div>
</header>

<div align="center">
    <?php
    if (!empty($validate) && $validate == true): ?>
        <div class="alert alert-danger" role="alert">
            Такой логин существует
        </div>
    <?php
    endif; ?>
    <form style="margin-top: 20px" class="container form" action="" method="post" autocomplete="off">
        <label class="form-label" style="font-size: 30px" for="last_name">Фамилия</label>
        <input style="width: 500px" class="form-control" type="text" id="last_name" name="last_name">

        <label class="form-label" style="font-size: 30px" for="first_name">Имя</label>
        <input style="width: 500px" class="form-control" type="text" id="first_name" name="first_name">

        <label class="form-label" style="font-size: 30px" for="patronymic">Отчество</label>
        <input style="width: 500px" class="form-control" type="text" id="patronymic" name="patronymic">

        <label class="form-label" style="font-size: 30px" for="phone">Номер телефона</label>
        <input style="width: 500px" class="form-control" type="text" id="phone" name="phone">

        <label class="form-label" style="font-size: 30px" for="login">Логин</label>
        <input style="width: 500px" class="form-control" type="text" id="login" name="login">

        <label class="form-label" style="font-size: 30px" for="password">Пароль</label>
        <input style="width: 500px" width="10" class="form-control" type="password" id="password" name="password">

        <button style="margin-top: 20px; font-size: 25px" class="btn btn-primary">Войти</button>
    </form>
</div>
</body>
</html>
