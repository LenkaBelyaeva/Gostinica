<?php

namespace Model;

require_once('./aotuload.php');

use \Config;

class Klient
{
    const DB = '.\config.php';

    public function login($request)
    {
        require_once(self::DB);

        $query = 'select * from klient
                    where login = "' . $request['login'] . '" and password = "' . $request['password'] . '"';

        $query = mysqli_query((new Config())->connectMySql(), $query);

        if ($query) {
            session_start();
            $_SESSION['id_user'] = mysqli_fetch_array($query)['id'];
            header('Location: http://caitkyrsovik/', true, 301);
            exit();
        } else {
            die('Not done');
        }
    }

    public function findKlient($id)
    {
        require_once(self::DB);

        $query = 'select * from klient
                    where id = ' . $id;

        $query = mysqli_query((new Config())->connectMySql(), $query);

        if ($query) {
            return $klient = mysqli_fetch_array($query);
        } else {
            die('Not Done');
        }
    }

    public function logout()
    {
        $_SESSION['id_user'] = null;

        header('Location: http://caitkyrsovik/', true, 301);
        exit();
    }
}