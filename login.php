<?php
require_once "src/service/SessionService.php";


$session = new SessionService();

if(isset($_GET['email']) && isset($_GET['accessCode'])){
    $session->login($_GET['email'], $_GET['accessCode']);
}else{
    header("Location: /" );
}
