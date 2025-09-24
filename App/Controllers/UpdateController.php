<?php
namespace App\Controllers;

use App\Database\Models\Product;
use App\Support\Csrf;
use App\Support\ShowPages;

class UpdateController {
    public function index(){
        ShowPages::getPage('update.php');
    }
    public function user(){
        ShowPages::getPage('usuario.php');
    }

    public function editProduct($data){
        // var_dump($data);
        var_dump(Csrf::validateToken());
    }

    public function editUser($data){
        var_dump($data);
    }

}

