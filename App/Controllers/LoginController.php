<?php
namespace App\Controllers;

use App\Support\ShowPages;

class LoginController {
    public function index(){
        try {
            ShowPages::getPage('login.php');   
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }

    public function login($data){
        var_dump($data);
    }
}