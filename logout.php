<?php

session_start();

$_SESSION['id_user'] = null;

header('Location: http://caitkyrsovik/', true, 301);
exit();
