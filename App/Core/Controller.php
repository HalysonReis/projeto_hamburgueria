<?php
namespace App\Core;


class Controller {
    public function excute(string $router){
        if(!str_contains($router, '@')){
            throw new \Exception("Rote '$router' registrada errada");
        }

        list($nameController, $method) = explode('@', $router);

        $namespace = 'App\Controllers\\';

        $ControllerNamespace = $namespace.$nameController;

        if(!class_exists($ControllerNamespace)){
            throw new \Exception("Controller '$ControllerNamespace' não existe");
        }

        $controller = new $ControllerNamespace;

        if(!method_exists($controller, $method)){
            throw new \Exception("Método '$method' não existe");
        }

        #$params = new ControllerParams;

        #$params = $params->get($router);

        $controller->$method();
    }
}