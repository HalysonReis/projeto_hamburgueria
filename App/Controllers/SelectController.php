<?php
namespace App\Controllers;

use App\Support\ShowPages;

class SelectController {
    public function index(){
        ShowPages::getPage('listar.php');
    }
}