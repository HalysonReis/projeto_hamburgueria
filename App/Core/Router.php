<?php
namespace App\Core;

use App\Core\RoutersFilter;

class Router {
    public static function run(){
        try {
            $routerRergistered = new RoutersFilter;
            $router = $routerRergistered->get();
            
            $controller = new Controller;

            $controller->excute($router);

        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}