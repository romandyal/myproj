<?php

require_once 'components/Db.php';

class GetTableTest {
    
    public static function getTable()
    {
        
        define('ROOT', "/var/www/myproj");
        $db = Db::getConnection();
        $sql = 'DROP DATABASE IF EXISTS `testDb`;CREATE DATABASE `testDb`;CREATE TABLE testDb.user LIKE myproj.user;
        INSERT INTO testDb.user SELECT * FROM myproj.user;';
        $result = $db->prepare($sql);
        return $result->execute();

    }
}