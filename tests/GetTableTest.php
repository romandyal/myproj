<?php

require_once 'components/Db.php';

class GetTableTest {
    
    public static function getTable()
    {
        
        define('ROOT', "/var/www/myproj");
        $db = Db::getConnection();
        $sql = 'DROP DATABASE IF EXISTS `testDb`;CREATE DATABASE `testDb`;CREATE TABLE testDb.user LIKE myproj.user;
        INSERT INTO testDb.user SELECT * FROM myproj.user;CREATE TABLE testDb.news LIKE myproj.news;
        INSERT INTO testDb.news SELECT * FROM myproj.news;';
        $result = $db->prepare($sql);
        return $result->execute();

    }

//    public static function getTableNews()
//    {
//        define('ROOT', "/var/www/myproj");
//        $db = Db::getConnection();
//        $sql = 'CREATE TABLE testDb.news LIKE myproj.news;
//        INSERT INTO testDb.news SELECT * FROM myproj.news;';
//        $result = $db->prepare($sql);
//        return $result->execute();
//    }
}