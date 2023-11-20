<?php

session_start();

require_once('aotuload.php');

use Model\Nomer;
use Model\Klient;

$nomer = new Nomer();
$klient = new Klient();

$nomera = $nomer->getAllNomers();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостиница GrandAtlee</title>
    <meta name="desciption" content="Забронируй лучший для себя номер">
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
<header>
    <div class="container" id="glavnai">
        <div class="logo">
            <a href="index.php"><img src="img/logo.jpg" alt="Grand Atlee"></a>
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
            <!--               <button><a href="Nomer/form.php">Забронировать</a></button>-->

            <?php
            if (!empty($_SESSION['id_user'])): $klient = $klient->findKlient($_SESSION['id_user']) ?>
                <?= $klient['first_name'] . ' ' . $klient['last_name'] ?>
                <form action="logout.php" method="post">
                    <button type="submit">Выход</button>
                </form>
            <?php
            else: ?>
                <a href="login.php">
                    <button style="cursor: pointer">Войти</button>
                </a>
                <a style="cursor: pointer" href="register.php">
                    <button style="cursor: pointer">Регистрация</button>
                </a>
            <?php
            endif; ?>

        </div>
        <div class="header_contacts">
            <a href="#">+7 (910) 018-35-44</a>
            <p>Обратная связь</p>
        </div>
    </div>
</header>
<section class="banner">
    <div class="container">
        <h1>Незабываемый отдых<br>
            в Гостинице GrandAtlee.<br>
            Сделай свой отдых<br>
            незабываемым!
        </h1>
        <div class="h1_li">
            <ul>
                <li>Вежливый<br>
                    персонал и современные<br>
                    номера
                </li>
                <li>Услуги высокого уровня<br>
                    в области обслуживания<br>
                    клиентов
                </li>
            </ul>
            <button class="main_button">
                Забронировать номер
            </button>
        </div>
    </div>
</section>
<section class="avantage" id="avantages">
    <div class="container">
        <h2 class="section_title"> Наши удобства</h2>
        <div class="avantage_inner">
            <div class="avantage_col">
                <div class="avantage_box centr">
                    <h3 class="mini_title">Фитнес-центр </h3>
                    <p class="subtitle">Cочетает в себе все лучшее, <br>
                        что есть в индустрии <br>
                        фитнеса сегодня</p>
                    <img src="img/01.png">
                </div>
                <div class="avantage_box animals">
                    <h3 class="mini_title">Проживание с <br>
                        животными </h3>
                    <p class="subtitle">Возможность принятия <br>
                        ваших любимых <br>
                        питомцев </p>
                    <img src="img/04.png">
                </div>
            </div>
            <div class="avantage_col">
                <div class="avantage_box cars">
                    <h3 class="mini_title">Парковка</h3>
                    <p class="subtitle">Лучшие места <br>
                        для вашей машины. <br>
                        Безопасность и удобства <br>
                        парковочных мест </p>
                    <img src="img/02.png">
                </div>
            </div>
            <div class="avantage_col">
                <div class="avantage_box service">
                    <h3 class="mini_title">Круглосуточное <br>
                        обслуживание</h3>
                    <p class="subtitle">Питание и уборка <br>
                        в лучшем качестве <br>
                        прямо в номер</p>
                    <img src="img/03.png">
                </div>
                <div class="avantage_box swimin">
                    <h3 class="mini_title">Бассейн</h3>
                    <p class="subtitle"> Возможность провести свободное время <br>
                        с комфортом, удовольствием <br>
                        и пользой для здоровья</p>
                    <img src="img/05.png">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="agents" id="nomera">
    <div class="wrapper">
        <h2 class="section_title"> Номера</h2>
        <div class="agent-cards">
            <?php
            $n = 0;
            foreach ($nomera

            as $value):
            $n++; ?>
            <?php
            if ($n > 3): ?>
        </div>
        <div class="agent-cards">
            <div class="agent-card">
                <img width="450" height="330" src="<?= $value['img'] ?>" alt="">
                <div class="agent-info">
                    <p><?= $value['name'] ?></p>
                    <div class="agent-block">
                        <p class="agent-name"><?= $value['nomer_summa'] . 'Р' ?></p>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                            <?php
                            if (!empty($_SESSION['id_user'])): ?>
                                <button type="submit">Забронировать</button>
                            <?php
                            endif; ?>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            else: ?>
                <div class="agent-card">
                    <img width="450" height="330" src="<?= $value['img'] ?>" alt="">
                    <div class="agent-info">
                        <p><?= $value['name'] ?></p>
                        <div class="agent-block">
                            <p class="agent-name"><?= $value['nomer_summa'] . 'Р' ?></p>
                            <?php
                            if (!empty($_SESSION['id_user'])): ?>
                                <button type="submit">Забронировать</button>
                            <?php
                            endif; ?>
                        </div>
                    </div>
                </div>
            <?php
            endif; ?>
            <?php
            endforeach; ?>
        </div>

    </div>
</section>
<section id="predlogi" class="predlog">
    <h2 class="section_title">Предложения</h2>
    <div class="container" style="display: flex">
        <div class="novos">
            <div class="novoe">
                <img src="img/11.PNG" alt="">
                <div class="novoe-container">
                    <p>Приглашаем вас с нами отметить<br>
                        ГРАНДиозный Новый Год</p>
                </div>
            </div>
        </div>
        <div style="margin-left: 150px" class="novos">
            <div class="novoe">
                <img src="img/22.PNG" alt="">
                <div class="novoe-container">
                    <p>Забронируйте 3 ночи подряд и получите<br>
                        скидку 30% на следующую бронь</p>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="contact">
    <hr>
    <div style="display: flex">
        <p style="font-size: 40px">Grand Atlee</p>
        <a style="margin-top: 4%; margin-left: 70%" href="#">+7 (910) 018-35-44</a>
    </div>
</footer>
</body>
</html>