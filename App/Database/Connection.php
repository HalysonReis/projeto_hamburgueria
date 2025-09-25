<?php
namespace App\Database;

class Connection {
    private static $connection = null;

    public static function connect(){
        try {
            if(!self::$connection){
            self::$connection = new \PDO("mysql:host=localhost;dbname=honorioburguer", "root", "h4L!50N%&i$", [
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
                ]);
            }
    
            return self::$connection;
            
        } catch (\Throwable $th) {
            http_response_code(500);
            messageError();
        }
    }
}