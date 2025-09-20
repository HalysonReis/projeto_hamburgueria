<?php
namespace App\Core;

use App\Support\Uri;
use App\Support\RequestType;
use App\Routes\Routes;

class RoutersFilter{
    private string $uri;
    private string $method;
    private array $routesRegistered;

    public function __construct()
    {
        $this->uri = Uri::get();
        $this->method = RequestType::get();
        $this->routesRegistered = Routes::get();
    }

    public function simpleRouter(){
        if(array_key_exists($this->uri, $this->routesRegistered[$this->method])){
            return $this->routesRegistered[$this->method][$this->uri];
        }

        return null;
    }

    public function get(){
        $router = $this->simpleRouter();
        if($router){
            return $router;
        }
    }
}