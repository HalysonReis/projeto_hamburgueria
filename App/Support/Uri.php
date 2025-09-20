<?php
namespace App\Support;

class Uri {
    public static function get(){
        $url = '/';
        if(isset($_GET['url'])){
            $url = parse_url($_GET['url'], PHP_URL_PATH);
        }

        return trim($url);
    }
}