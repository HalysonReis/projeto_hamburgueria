<?php
namespace App\Core;

class Request{
    public static function all(){
        return $_POST;
    }

    public static function query(string $name){
        if(!isset($_GET[$name])){
            throw new \Exception("Não existe query string");
        }

        return $_GET[$name];
    }

    public function isJson(string $data){
        json_decode($data);

        return json_last_error() === JSON_ERROR_NONE;
    }

    public static function toJson(array $data){
        return json_encode($data);
    }

    public static function toArray(string $data){
        if(self::isJson($data)){
            return json_decode($data);
        }
    }
}