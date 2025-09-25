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
                "listar/todos" => "SelectController@getProdutos",
                "editar" => "UpdateController@index",
                "editar/[0-9]+" => "SelectController@getProduto",
                "usuario" => "UpdateController@user",
                "usuario/listar" => "SelectController@getUser",
                "usuario/listar/home" => "SelectController@getUserHome",
            ],
            "post" => [
                "produto/editar/[0-9]+" => "UpdateController@editProduct",
                "produto/deletar/[0-9]+" => "DeleteController@produto",
                "produto/cadastrar" => "InsertController@insert",
                "usuario/editar" => "UpdateController@editUser",
                "login/usuario" => "LoginController@login"
            ]
        ];
    }
}