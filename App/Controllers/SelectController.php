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
        $request = Request::toJson($select);
        echo $request;
    }

    public function getProduto($data){
        $product = new Product();

        header('Content-Type: application/json');

        $select = $product->findBy('id_burguer', $data[0]);
        $request = Request::toJson($select);
        echo $request;
    }

    public function getUser($data){
        $user = new User();

        header('Content-Type: application/json');

        $select = $user->findBy('id_user', 1);
        $request = Request::toJson($select);
        echo $request;
    }

}