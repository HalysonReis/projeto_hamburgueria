<?php
namespace App\Support;

class ShowPages{
    public static function getPage(string $file = "home.php"){
        $filePath = './App/Views/'.$file;
        if(file_exists($filePath)){
            include $filePath;
            return true;
        }

        throw new \Exception("Pagina não encontrada");
        
    }
}