<?php
function uploadImagem($img) {
    try {
        $caminho = './Public/Uploads_img_burguer/';

        if(($img['size'] / 1024) / 1024 > 4){
            throw new \Exception("Imagem muito grande", 1);
        }

        $new_img = $img['name'];
        $new_name = uniqid();
        $extencao_imagem = strtolower(pathinfo($new_img, PATHINFO_EXTENSION));

        $extensao_permitida = ['jpg', 'jpeg', 'png'];

        if(!in_array(strtolower($extencao_imagem), $extensao_permitida)){
            throw new \Exception("Extensão {$extencao_imagem} não é permitida", 1);
            
        }
        
        $caminho_img = $caminho . $new_name. '.'. $extencao_imagem;
        
        $upload_img = move_uploaded_file($img['tmp_name'], $caminho_img);
        
        return $caminho_img;
    } catch (\Exception $e) {
        if($e->getCode() == 1){
            messageError($e->getMessage());
        }
        messageError("Erro ao fazer o upload da imagem");
    }
}

function deleteImage($caminho){
    if(file_exists($caminho)){
        return unlink($caminho);
    }
    return false;
}