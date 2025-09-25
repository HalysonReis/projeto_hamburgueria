<?php
namespace App\Controllers;

use App\Core\Request;
use App\Support\Csrf;
use App\Support\TokenJwt;
use App\Support\ShowPages;
use App\Database\Models\Product;

class InsertController {
    public function index(){
        TokenJwt::validaLogin();
        ShowPages::getPage('cadastro.php');
    }
    public function insert(){
         try {
            header('Content-Type: application/json');
            TokenJwt::validaLogin();
            $dataRequest = Request::all();

            if(!Csrf::validateToken()){
                throw new \Exception("Token da requisição inválido", 1);
            }

            $fileImage = $_FILES;

            if($fileImage['img_lanche']['name'] === ''){
                throw new \Exception("Envie uma imagem para cadastrar", 2);
                
            }

            if($dataRequest['nome'] === ''){
                throw new \Exception("Envie um nome para cadastrar", 2);
                
            }

            if($dataRequest['descricao'] === ''){
                throw new \Exception("Envie uma descrição para cadastrar", 2);
                
            }

            if($dataRequest['preco'] === ''){
                throw new \Exception("Envie um preço para cadastrar", 2);
                
            }

            $dataRequest['src_imagem'] = uploadImagem($fileImage['img_lanche']);
            
            $product = new Product();

            unset($dataRequest['token']);

            $create = $product->create($dataRequest);

            if($create !== true){
                throw new \Exception("Não foi possivel cadastrar. Tente novamente depois", 2);
            }

            $request = Request::toJson(["success" => true, "data" => $dataRequest]);
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