<?php
class DB {

    private static $conn;

    public static function getConn()
    {
        if (!self::$conn) {
            $db = new PDO('mysql:host=localhost;dbname=soy_mi_planner;charset=utf8;','casa','1234qwer');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn = $db;
        }
        return self::$conn;
    }

}
