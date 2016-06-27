<?php

class Db
{

    public static function getConnection($stat='dev')
    {
        if($stat === 'test') {
            $paramsPath = ROOT . '/config/db_params_test.php';
        }else
        {
            $paramsPath = ROOT . '/config/db_params.php';
        }
            $params = include($paramsPath);

            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            $db = new PDO($dsn, $params['user'], $params['password']);

            return $db;

    }


    public static function connect()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new ORM($dsn, $params['user'],$params['password']);

        return $db;
    }


    public static function find($table,$data)
    {

        $db = Db::connect();
//        var_dump($db);
//        $data = "'".$data."'";

        // Текст запроса к БД

        $sql = "SELECT * FROM $table WHERE name LIKE :data OR email LIKE :data OR phone LIKE :data";
//        OR email LIKE data = :data OR phone LIKE data = :data
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
//        $result->bindParam(':user', $table, ORM::PARAM_STR);
//        $result->bindParam(':data', $data, ORM::PARAM_STR);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(ORM::FETCH_ASSOC);
        $result->execute(array(":data" => "%" . $data . "%"));

        return $result->fetch();

    }
}