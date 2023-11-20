<?php

namespace Model;

require_once('./aotuload.php');

use \Config;

class Nomer
{
    const DB = '.\config.php';

    public function getAllNomers()
    {
        require_once(self::DB);

        $query = 'select * from nomer';

        $nomer = mysqli_query((new Config())->connectMySql(), $query);

        return $nomer;
    }

    public function addNomer($request, $fileUrl)
    {
        require_once(self::DB);

        $query = 'insert into nomer (`name`, nomer, etagh, nomer_summa, img)
                    value ("' . $request['nameNomer'] . '","' . $request['nomer'] . '",' . $request['etagh'] . ',' . $request['summa'] . ',"' . $fileUrl . '")';

        $nomer = mysqli_query((new Config())->connectMySql(), $query);

        if ($nomer) {
            header('Location: http://Gostinica/', true, 301);
            exit();
        } else {
            die('Not Done');
        }
    }
}
