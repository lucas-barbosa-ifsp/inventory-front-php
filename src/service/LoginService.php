<?php
require_once "config/config.php";
require_once "src/service/ApiService.php";

class LoginService
{

    public function login($email, $accessCode){
        $api = new ApiService();
        $login = $api->post(config::uri() . "/login/", json_encode(["email" => $email, "accessCode" => $accessCode]));

        return $login;

    }

}