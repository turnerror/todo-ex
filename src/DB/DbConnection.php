<?php


namespace App\DB;


class DbConnection
{

    private const HOST = "127.0.0.1";
    private const USERNAME = "root";
    private const PASSWORD = "password";
    private const DBNAME = "todo";

    public function connect(): \PDO
    {
        $db = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME,self::USERNAME,self::PASSWORD);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }

}