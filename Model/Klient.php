<?php

namespace Model;

require_once('../autoload/autoloadForInFile.php');

use \Config;

class Klient
{
    public function login($request)
    {
        $query = 'select * from klient
                    where login = "' . $request['login'] . '" and password = "' . $request['password'] . '"';

        $query = mysqli_query((new Config())->connectMySql(), $query);

        $query = mysqli_fetch_array($query);

        if (!empty($query)) {
            session_start();
            $_SESSION['id_user'] = $query['id'];
            $_SESSION['notDeleteNomer'] = 0;
            if ($query['login'] == 'admin'){
                header('Location: http://Gostinica/view/admin.php', true, 301);
                exit();
            }
            return true;
        } else {
            return false;
        }
    }

    public function loginById($id)
    {
        $query = 'select * from klient where id = '.$id;

        $query = mysqli_query((new Config())->connectMySql(),$query);

        $query = mysqli_fetch_array($query);

        if (!empty($query))
        {
            session_start();
            $_SESSION['id_user'] = $query['id'];
            if ($query['login'] == 'admin'){
                header('Location: http://Gostinica/view/admin.php', true, 301);
                exit();
            }
            return true;
        } else {
            return false;
        }
    }

    public function register($request): bool
    {
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