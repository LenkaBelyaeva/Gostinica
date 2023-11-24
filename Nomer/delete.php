<?php

require_once('../autoload/autoloadForInFile.php');

use Model\Nomer;

$nomer = new Nomer();

$nomer->deleteNomer($_POST['id']);
