<?php

session_start();

require_once('../autoload/autoloadForInFile.php');

use Model\Nomer;

$nomer = new Nomer();

try {
    $nomer->deleteNomer($_POST['id']);
} catch (Exception)
{
    $_SESSION['notDeleteNomer'] = 1;
    header('Location: http://Gostinica/view/admin.php', true, 301);
    exit;
}

