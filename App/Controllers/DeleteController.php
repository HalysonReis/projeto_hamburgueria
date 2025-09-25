<?php
namespace App\Controllers;

use App\Core\Request;
use App\Support\TokenJwt;
use App\Database\Models\Product;

class DeleteController {
    public function produto($data){
        try {
            TokenJwt::validaLogin();
            header('Content-Type: application/json');

            $id = $data[0];

            $product = new Product();
            
            $burger = $product->findBy("id_burguer", $id);

            if(!deleteImage($burger['src_imagem'])){
                throw new \Exception("Não foi possivel excluir o burger", 1);
            }

            $delete = $product->delete('id_burguer', $id);

            if(!$delete){
                throw new \Exception("Não foi possivel excluir o burger", 1);
            }

            $request = Request::toJson(["success" => true, "data" => $delete]);
            echo $request;
        } catch (\Exception $e) {
            if($e->getCode() == 1){
                messageError($e->getMessage());
            }
            messageError();
        }
        
    }

}