<?php
namespace App\Controllers;

use App\Support\ShowPages;

class UpdateController {
    public function index(){
        ShowPages::getPage('update.php');
    }
}