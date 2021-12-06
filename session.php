<?php

require_once "src/service/SessionService.php";


$session = new SessionService();
var_dump($_SESSION);
die();
if(!$session->isLogged()){
    $session->logoff();
}

var_dump($_SESSION);
