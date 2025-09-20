<?php
namespace App\Controllers;

use App\Support\ShowPages;

class InsertController {
    public function index(){
        ShowPages::getPage('cadastro.php');
    }
}