<?php
namespace App\Controllers;

use App\Core\Request;
use App\Support\Csrf;
use App\Support\ShowPages;
use App\Database\Models\User;
use App\Database\Models\Product;

class UpdateController {
    public function index(){
        ShowPages::getPage('update.php');
    }
    public function user(){
        ShowPages::getPage('usuario.php');
    }

    public function editProduct($data){
        try {
            header('Content-Type: application/json');
            $dataRequest = Request::all();

            if(!Csrf::validateToken()){
                throw new \Exception("Token da requisição inválido", 1);
            }

            unset($dataRequest['token']);

            $fileImage = $_FILES;

            if($fileImage['img_lanche']['name'] !== ''){
                $dataRequest['src_imagem'] = uploadImagem($fileImage['img_lanche']);
            }

            $product = new Product();

            $update = $product->update("id_burguer", $data[0], $dataRequest);

            if($update !== true){
                throw new \Exception("Não foi possivel editar. Tente novamente depois", 2);
            }

            $request = Request::toJson(["success" => true, "data" => 1]);
            echo $request;
        } catch (\Exception $e) {
            if($e->getCode() == 1){
                http_response_code(403);
                messageError($e->getMessage(), 403);
            }else if($e->getCode() == 2){
                messageError($e->getMessage());
            }
            messageError($e->getMessage());
        }
        
    }

    public function editUser(){
        try {
            header('Content-Type: application/json');
            $dataRequest = Request::all();

            if(!Csrf::validateToken()){
                throw new \Exception("Token da requisição inválido", 1);
            }

            unset($dataRequest['token']);

            if($dataRequest['senha'] == ""){
                unset($dataRequest["senha"]);
            }

            $user = new User();

            $update = $user->update("id_user", 1, $dataRequest);

            if($update !== true){
                throw new \Exception("Não foi possivel editar. Tente novamente depois", 2);
            }

            $request = Request::toJson(["success" => true, "data" => 1]);
            echo $request;
        } catch (\Exception $e) {
            if($e->getCode() == 1){
                http_response_code(403);
                messageError($e->getMessage(), 403);
            }else if($e->getCode() == 2){
                messageError($e->getMessage());
            }
            messageError($e->getMessage());
        }
    }

}

