<?php


class DBConnect
{
    public static $dbName = 'test';
    private static $dbHost = 'localhost';
    private static $dbLogin = 'root';
    private static $dbPassword = '';

    private static function getDSN(){
        return "mysql:dbname=".self::$dbName.";host=".self::$dbHost;
    }

    public static function getConnection(){
        return new PDO(self::getDSN, self::$dbLogin, self::$dbPassword);
    }

//    public static function d($arr) {
//        echo '<pre>';
//        print_r($arr);
//        echo '</pre>';
//    }

}