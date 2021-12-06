<?php
require_once "config/config.php";
require_once "src/service/ApiService.php";
class SessionService
{


    private function init(){

    }

    function isLogged(){
        return isset($_SESSION['token']);
    }

    function logoff($redirect = true){
        session_destroy();
        if($redirect){
            header("Location: /");
        }
    }

    function login($email, $accessCode, $redirect = "/blocos.php"){

        $api =  new ApiService();
        $user = $api->post(config::uri() ."/login", json_encode(["email" => $email, "accessCode" => $accessCode, "token"  => ""]));


        if($user != null){
            $_SESSION['user'] = $user->email;
            $_SESSION['token'] = $user->token;
            header("Location: " . $redirect);
        }else{
            session_destroy();
            header("Location: /");
        }







    }
}