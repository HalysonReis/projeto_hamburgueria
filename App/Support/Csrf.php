<?php
namespace App\Support;

use App\Core\Request;

class Csrf {
    public static function GenerateToken(){
        if(isset($_SESSION["token"])){
            unset($_SESSION["token"]);
        }

        $_SESSION["token"] = md5(uniqid());

        return "<input type='hidden' name='token' id='token' value='{$_SESSION["token"]}'>";
    }

    public static function validateToken(){
        if(!isset($_SESSION["token"])){
            throw new \Exception("Token inválido");
        }

        $token = Request::all()['token'];

        if($_SESSION['token'] !== $token){
            throw new \Exception("Token inválido");
        }


        return true;
    }
}