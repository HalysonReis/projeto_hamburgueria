<?php

function messageError($message = 'Ocorreu um erro inesperado', $code = 0){
    echo json_encode([
        "success" => false,
        "message" => $message,
        "code" => $code
    ]);

    exit;
}