<?php
namespace App\Support;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenJwt{
    private static string $senhaJWT = "3#t!OIfW%M51x3RyVFOs8yCjFvyy8R#4";
    public static function encodejwt($payload){
        try {
            $jwt = JWT::encode($payload, self::$senhaJWT, 'HS256');
    
            if(!isset($_SESSION)){
                session_start();
            }
    
            if(isset($_SESSION['tolkenLogin'])){
                unset($_SESSION['tolkenLogin']);
            }
    
            $_SESSION["tolkenLogin"] = $jwt;
            
            return true;
        } catch (\Throwable $th) {
            messageError();
        }
    }

    public static function decodejwt(){
        try {
            $jwt = JWT::decode($_SESSION['tolkenLogin'], new Key(self::$senhaJWT, 'HS256'));
            return [
                'sucess' => TRUE,
                'jwt' => $jwt
            ];
        } catch (\Throwable $th) {
            return [
                'sucess' => FALSE,
                'msg' => 'Tolken inválido'
            ];
        }
    }

    public static function validaLogin(){
        $dadosJwt = self::decodejwt();
        if($dadosJwt['sucess']){
            return TRUE;
        }else {
            header('Content-Type: application/json');
            messageError("Login inválido");
        }
    }
}