<?php
class Database {
    //credentials for Xampp
    /* private static $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    private static $username = 'root'; 
    private static $db; */

    //credentials for Heroku
    private static $dsn = 'mysql:host=lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=n9ledcrwnfrpiqpx';
    private static $username = 'zfymazkfxs7zfruh';
    private static $password = 'g45w0tdqhhg6tuo8';   
    private static $db;

    private function __construct() {}

    public static function getDB() {
        if(!isset(self::$db)){
            try {
                self::$db = new PDO(self::$dsn, 
                                    self::$username,
                                    self::$password); 
            } catch (PDOException $e) {
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('view/error.php');
                exit();
            }
        }
        return self::$db;
    }
}