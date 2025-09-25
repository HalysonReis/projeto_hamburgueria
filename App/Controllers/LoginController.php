<?php
namespace App\Controllers;

use App\Core\Request;
use App\Support\Csrf;
use App\Support\TokenJwt;
use App\Support\ShowPages;
use App\Database\Models\User;

class LoginController {
    public function index(){
        try {
            ShowPages::getPage('login.php');   
        } catch (\Throwable $e) {
            messageError($e->getMessage());
        }
    }

    public function login(){
        try {
            header('Content-Type: application/json');
            $dataRequest = Request::all();

            if(!Csrf::validateToken()){
                throw new \Exception("Token da requisição inválido", 1);
            }

            $user = new User();
            $user->setFeilds('email, senha');

            $select = $user->findBy('email', $dataRequest['email']);

            if(!$select){
                throw new \Exception("Email Inválido", 1);
            }

            if(!password_verify($dataRequest['senha'], $select['senha'])){
                throw new \Exception("Senha Inválida", 1);
            }

            $payload = [
                'iss' => 'HonorioBurger',
                'sub' => 'Honorio',
                'exp' => time() + (60 * 30),
                'iat' => time(),
            ];

            TokenJwt::encodejwt($payload);

            $request = Request::toJson(["success" => true, "data" => TokenJwt::validaLogin()]);
            echo $request;
        } catch (\Exception $e) {
            messageError($e->getMessage());
        }
    }
}