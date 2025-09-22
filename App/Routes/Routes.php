<?php
namespace App\Routes;

class Routes{
    public static function get(){
        return [
            "get" => [
                "/" => 'HomeController@index',
                "cadastrar" => "InsertController@index",
                "login" => "LoginController@index",
                "listar" => "SelectController@index",
                "editar" => "UpdateController@index",
            ],
            "post" => [
                // "update" => "UpdateController@product",
                "update/user" => "UpdateController@user",
            ]
        ];
    }
}