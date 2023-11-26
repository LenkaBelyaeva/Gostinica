<?php

namespace Model;

require_once('../autoload/autoloadForInFile.php');

use \Config;
use Model\Klient;
use mysql_xdevapi\Exception;

class Nomer
{
    public function getAllNomers()
    {
        $query = 'select * from nomer';

        $nomer = mysqli_query((new Config())->connectMySql(), $query);

        return $nomer;
    }

    public function getNomerById($id)
    {
        $query = 'select * from nomer where id = '.$id;

        $nomer = mysqli_query((new Config())->connectMySql(),$query);

        return $nomer = mysqli_fetch_array($nomer);
    }

    public function addNomer($request, $fileUrl)
    {
        $query = 'insert into nomer (`name`, nomer, etagh, nomer_summa, img)
                    value ("' . $request['nameNomer'] . '","' . $request['nomer'] . '",' . $request['etagh'] . ',' . $request['summa'] . ',"' . $fileUrl . '")';

        $nomer = mysqli_query((new Config())->connectMySql(), $query);

        if ($nomer) {
            header('Location: http://Gostinica/view/admin.php', true, 301);
            exit();
        } else {
            die('Not Done');
        }
    }

    public function deleteNomer($id){
        $klient = new Klient();

        $query = 'delete from nomer
                    where id = '.$id;

        $nomer = mysqli_query((new Config())->connectMySql(), $query);

        if ($query){
            header('Location: http://Gostinica/view/admin.php', true, 301);
            exit();
        } else
            die('not done');
    }
}
