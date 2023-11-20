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

        $query = mysqli_fetch_array($query);

        if (!empty($query)) {
            session_start();
            $_SESSION['id_user'] = $query['id'];
            return true;
        } else {
            return false;
        }
    }

    public function register($request): bool
    {
        require_once(self::DB);

        if (!empty($this->findKlientByLogin($request['login']))) {
            return false;
        } else {
            $query = 'insert into klient (first_name, last_name, patronymic, phone, login, password) 
                        values ("' . $request['first_name'] . '","' . $request['last_name'] . '","' . $request['patronymic'] . '","' . $request['phone'] . '","' . $request['login'] . '","' . $request['password'] . '")';

            $query = mysqli_query((new Config())->connectMySql(), $query);

            if ($query) {
                if ($this->login($request)) {
                    return true;
                }
            }
            return false;
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

    public function findKlientByLogin($login)
    {
        require_once(self::DB);

        $query = 'select * from klient
                    where login = "' . $login . '"';

        if (mysqli_query((new Config())->connectMySql(), $query)) {
            $query = mysqli_query((new Config())->connectMySql(), $query);
            return $klient = mysqli_fetch_array($query);
        } else {
            return 0;
        }
    }

    public function logout()
    {
        $_SESSION['id_user'] = null;

        header('Location: http://Gostinica/', true, 301);
        exit();
    }
}