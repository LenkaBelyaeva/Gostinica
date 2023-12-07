<?php

session_start();

require_once('../autoload/autoloadForInFile.php');

use Model\Nomer;
use Model\Klient;
use Model\Bronirovanie;

$nomer = new Nomer();
$klient = new Klient();
$bronirovanie = new Bronirovanie();

$klient = $klient->findKlient($_SESSION['id_user']);

if (!empty($_POST['zaezd'])):

    $nomer = $nomer->getNomerById($_POST['id_nomer']);

    $rez = (strtotime($_POST['viezd']) - strtotime($_POST['zaezd']))/86400;

    $bronirovanie->add($_POST,$klient['id'],$_POST['id_nomer'],$rez*$nomer['nomer_summa']);
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
    <div class="container" id="glavnai">
        <div class="logo">
            <a href="../view/index.php"><img src="../img/logo.jpg" alt="Grand Atlee"></a>
        </div>
        <nav>
            <ul>
                <li><a href="#glavnai">Главная</a></li>
                <li><a href="#avantages">Удобства</a></li>
                <li><a href="#nomera">Номера</a></li>
                <li><a href="#predlogi">Предложения</a></li>
                <li><a href="#contact">Контакты</a></li>
            </ul>
        </nav>
        <div class="broninom_button">
            <?= $klient['first_name'] . ' ' . $klient['last_name'] ?>
            <form action="logout.php" method="post">
                <button type="submit">Выход</button>
            </form>
        </div>
        <div class="header_contacts">
            <a href="#">+7 (910) 018-35-44</a>
            <p>Обратная связь</p>
        </div>
    </div>
</header>

<div align="center">
    <form style="margin-top: 20px" class="container form" action="" method="post">
        <input type="hidden" name="id_nomer" value="<?= $_POST['id_nomer'] ?>">

        <label class="form-label" style="font-size: 30px" for="zaezd">Заезд</label>
        <input style="width: 500px" class="form-control" type="date" id="zaezd" name="zaezd" required>

        <label class="form-label" style="font-size: 30px" for="viezd">Выезд</label>
        <input style="width: 500px" width="10" class="form-control" type="date" id="viezd" name="viezd" required>

        <button style="margin-top: 20px; font-size: 25px" class="btn btn-primary">Забронировать</button>
    </form>
</div>
</body>
</html>
