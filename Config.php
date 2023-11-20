<?php

class Config
{
    public string $hostName = 'localhost';
    public string $username = 'root';
    public string $password = '';
    public string $database = 'Kyrsovik_Gostinica';

    public function connectMySql()
    {
        return mysqli_connect($this->hostName, $this->username, $this->password, $this->database);
    }
}