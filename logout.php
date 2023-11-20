<?php

session_start();

$_SESSION['id_user'] = null;

header('Location: http://Gostinica/', true, 301);
exit();
