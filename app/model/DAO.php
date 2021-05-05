<?php

namespace App\model;

use PDO;
use PDOException;

class DAO
{
    protected static $dbh;
    private static $host = "localhost";
    private static $db = "linguist";
    private static $user = "root";
    private static $passwrd = "root";

    public static function PDOconnect(): PDO
    {
        try {
            self::$dbh = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$passwrd,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$dbh;
        } catch (PDOException $PDOerror) {
            print "An error has occurred while trying to access PDO: " . $PDOerror->getMessage();
            die();
        }
    }
}