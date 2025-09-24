<?php 
include('./vendor/autoload.php');

use App\Core\Router;
// echo "<pre>";

// var_dump($_SERVER);

// echo "</pre>";

session_start();

Router::run();