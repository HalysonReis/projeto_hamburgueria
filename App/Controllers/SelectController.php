<?php
namespace App\Controllers;

use App\Core\Request;
use App\Support\TokenJwt;
use App\Support\ShowPages;
use App\Database\Models\User;
use App\Database\Models\Product;

class SelectController {
    public function index(){
        TokenJwt::validaLogin();
        ShowPages::getPage('listar.php');
    }

    public function getProdutos(){
        $product = new Product();

        header('Content-Type: application/json');

        $select = $product->fetchAll();
        $request = Request::toJson(["success" => true, "data" => $select]);
        http_response_code(200);
        echo $request;
    }

    public function getProduto($data){
        try {
            TokenJwt::validaLogin();
            header('Content-Type: application/json');
            $product = new Product();

            if(empty($data)){
                throw new \Exception("Burger não informado.");
            }
    
            $select = $product->findBy('id_burguer', $data[0]);

            if(!$select){
                throw new \Exception("Burger não cadastrado");
            }

            $request = Request::toJson(["success" => true, "data" => $select]);
            echo $request;
        } catch (\Exception $e) {
            $messageError = $e->getMessage();
            messageError($messageError);
        }
    }

    public function getUser(){
        try {
            TokenJwt::validaLogin();
            header('Content-Type: application/json');

            $user = new User();
            $user->setFeilds('email, instagram, endereco, horario');

            $select = $user->findBy('id_user', 1);

            if(!$select){
                throw new \Exception("Usuário não encontrado");
            }

            $request = Request::toJson(["success" => true, "data" => $select]);
            echo $request;

        } catch (\Exception $e) {
            $messageError = $e->getMessage();
            messageError($messageError);
        }
    }

    public function getUserHome(){
        try {
            header('Content-Type: application/json');

            $user = new User();
            $user->setFeilds('instagram, endereco, horario');

            $select = $user->findBy('id_user', 1);

            if(!$select){
                throw new \Exception("Usuário não encontrado");
            }

            $request = Request::toJson(["success" => true, "data" => $select]);
            echo $request;

        } catch (\Exception $e) {
            $messageError = $e->getMessage();
            messageError($messageError);
        }
    }
}