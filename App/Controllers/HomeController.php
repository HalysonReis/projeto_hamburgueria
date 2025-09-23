<?php
namespace App\Controllers;

use App\Support\ShowPages;

class HomeController{
    public function index(){
        try {
            ShowPages::getPage();
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}