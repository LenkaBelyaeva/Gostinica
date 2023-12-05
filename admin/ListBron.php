<?php

session_start();
    require_once('../autoload/autoloadForInFile.php');

    use Model\Nomer;
    use Model\Klient;
    use Model\Bronirovanie;

    $_SESSION['notDeleteNomer'] = 0;

    $nomer = new Bronirovanie();
    $nomer = $nomer->getAllBron();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">

</head>
<body>
<header>
    <div class="container" id="glavnai">
        <div class="logo">
            <a href="../view/admin.php""><img src="../img/logo.jpg" alt="Grand Atlee"></a>
        </div>
        <nav>
            <ul>
                <li><a href="../view/admin.php">Номера</a></li>
                <li><a href="ListBron.php">Заброненные номера</a></li>
                <li><a href="../view/logout.php">Выход</a></li>
            </ul>
        </nav>
        <div class="header_contacts">
            <a href="#">+7 (910) 018-35-44</a>
            <p>Обратная связь</p>
        </div>
    </div>
</header>

<div class="container" style="margin-top: 50px">

    <table class="table">
        <tr>
            <th class="col">Фамилия</th>
            <th class="col">Имя</th>
            <th class="col">Название номера</th>
            <th class="col">Заезд</th>
            <th class="col">Выезд</th>
            <th class="col">Общая сумма</th>
        </tr>
        <?php while ($value = mysqli_fetch_array($nomer)): ?>
            <tr>
                <td><?= $value['last_name'] ?></td>
                <td><?= $value['first_name'] ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['zaezd'] ?></td>
                <td><?= $value['viezd'] ?></td>
                <td><?= $value['stoimost'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>