<?php

require_once('../autoload/autoloadForInFile.php');

use Model\Nomer;

$nomer = new Nomer();

$uploaddir = '../img/';

if (!empty($_POST)){
    if ($_FILES['file']['name'] != '') {
        $uploadfile = $uploaddir . $_FILES['file']['name'];

        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

        $nomer->addNomer($_POST, $uploadfile);
    } else {
        $uploadfile = '../img/notfoundPhoto.jpg';

        $nomer->addNomer($_POST, $uploadfile);
    }
}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body class="container">

    <header>
        <div class="container" id="glavnai">
            <div class="logo">
                <a href="../view/admin.php"><img src="../img/logo.jpg" alt="Grand Atlee"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="../view/admin.php">Номера</a></li>
                    <li><a href="#">Заброненные номера</a></li>
                    <li><a href="../view/logout.php">Выход</a></li>
                </ul>
            </nav>
            <div class="header_contacts">
                <a href="#">+7 (910) 018-35-44</a>
                <p>Обратная связь</p>
            </div>
        </div>
    </header>
    <form class="form" action="" method="post" enctype="multipart/form-data">

        <div class="md-3">
            <label class="form-label" for="nameNomer">Название номера</label>
            <input class="form-control" type="text" name="nameNomer" id="nameNomer" required autofocus>
        </div>

        <div class="mb-3">
            <label class="form-label" for="nomer">Номер</label>
            <input class="form-control" type="text" name="nomer" id="nomer" required>
        </div>

        <div class="md-3">
            <label class="form-label" for="etagh">Этаж</label>
            <input class="form-control" type="number" min="1" max="3" name="etagh" id="etagh" required>
        </div>

        <div class="md-3">
            <label class="form-label" for="summa">Сумма</label>
            <input class="form-control" type="number" min="0" max="10000" name="summa" id="summa" required>
        </div>

        <div class="md-3">
            <label class="form-label" for="file">Файл</label>
            <input class="form-control" type="file" name="file" id="file">
        </div>

        <div style="margin-top: 20px" align="center" class="md-3">
            <button class="btn btn-success" type="submit">Отправить</button>
        </div>

    </form>
    </body>
    </html>

<?php
