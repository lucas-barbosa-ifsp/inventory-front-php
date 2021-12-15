<?php
require_once "src/service/ApiService.php";
require_once "src/service/LoginService.php";
$api = new ApiService();

if(isset($_GET['email']) && isset($_GET['accessCode'])){
    $login = new LoginService();
    $isLogged = $login->login($_GET['email'], $_GET['accessCode']);
    if(isset($isLogged->status)){
        header('location: /?error=login-failed');
    }
    setcookie("token", $isLogged->token);
    setcookie("email", $isLogged->email);
    header("location: /blocos.php");
}
require_once "template/header.php";

