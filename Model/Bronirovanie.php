<?php

namespace Model;

require_once('../autoload/autoloadForInFile.php');

use \Config;

class Bronirovanie
{
    public function getAllBron()
    {
        $query = 'select user.last_name as last_name,
                         user.first_name as first_name,
                         n.name as name,
                         b.zaezd as zaezd,
                         b.viezd as viezd,
                         b.stoimost as stoimost
                    from klient `user`
                        inner join bronirovanie b on user.id = b.klient_id
                        inner join nomer n on b.nomer_id = n.id';

        $query = mysqli_query((new Config())->connectMySql(), $query);

        if ($query) {
            return $query;
        } else {
            die('not done');
        }
    }

    public function getAllBronByIdUser($id)
    {
        $query = 'select user.last_name as last_name,
                         user.first_name as first_name,
                         n.name as name,
                         b.zaezd as zaezd,
                         b.viezd as viezd,
                         b.stoimost as stoimost
                    from klient `user`
                        inner join bronirovanie b on user.id = b.klient_id
                        inner join nomer n on b.nomer_id = n.id
                    where b.klient_id = ' . $id;
        $query = mysqli_query((new Config())->connectMySql(), $query);

        if ($query) {
            return $query;
        } else {
            die('not done');
        }
    }

    public function add($request, $id_user, $id_nomer, $stoimost)
    {
        $query = 'insert into bronirovanie (zaezd, viezd, klient_id, nomer_id, stoimost)
                    values ("' . $request['zaezd'] . '","' . $request['viezd'] . '",' . $id_user . ',' . $id_nomer . ',' . $stoimost . ')';

        $query = mysqli_query((new Config())->connectMySql(), $query);

        if ($query) {
            header('Location: http://Gostinica/view/index.php', true, 301);
            exit();
        } else {
            die('not done');
        }
    }
}
