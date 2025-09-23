<?php
namespace App\Core;

use App\Support\Uri;
use App\Routes\Routes;
use App\Support\RequestType;

class ControllerParams {
    public function get($router){
        $uri = Uri::get();
        $routes = Routes::get();
        $method = RequestType::get();

        $indexRouter = array_search($router, $routes[$method]);

        $explodeUri = explode('/', $uri);

        $explodeRouter = explode('/', $indexRouter);

        $params = [];

        foreach ($explodeRouter as $index => $routerSegment) {
            if($routerSegment !== $explodeUri[$index]){
                $params[$index] = $explodeUri[$index];
            }
        }

        return array_values($params);
    }
}