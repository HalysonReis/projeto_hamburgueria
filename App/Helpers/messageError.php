<?php

function messageError($message = 'Ocorreu um erro inesperado'){
    echo json_encode([
        "success" => false,
        "message" => $message
    ]);

    exit;
}