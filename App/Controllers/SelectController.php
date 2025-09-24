<?php
namespace App\Controllers;

use App\Core\Request;
use App\Database\Models\Product;
use App\Database\Models\User;
use App\Support\ShowPages;

class SelectController {
    public function index(){
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
            header('Content-Type: application/json');
            $product = new Product();

            if(empty($data)){
                throw new \Exception("Burguer não informado.");
            }
    
            $select = $product->findBy('id_burguer', $data[0]);

            if(!$select){
                throw new \Exception("Burguer não cadastrado");
            }

            $request = Request::toJson(["success" => true, "data" => $select]);
            echo $request;
        } catch (\Exception $e) {
            $messageError = $e->getMessage();
            messageError($messageError);
        }
    }

    public function getUser($data){
        try {
            header('Content-Type: application/json');

            if(empty($data)){
                throw new \Exception("Burguer não informado.");
            }
            $user = new User();

            $select = $user->findBy('id_user', 1);

            if(!$select){
                throw new \Exception("Burguer não cadastrado");
            }

            $request = Request::toJson(["success" => true, "data" => $select]);
            echo $request;

        } catch (\Exception $e) {
            $messageError = $e->getMessage();
            messageError($messageError);
        }
    }

}