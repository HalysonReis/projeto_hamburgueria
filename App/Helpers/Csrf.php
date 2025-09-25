<?php

use App\Support\Csrf;

function getToken(){
    return Csrf::GenerateToken();
}