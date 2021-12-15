<?php

if(!isset($_COOKIE['token'])){
    header("Location: index.php?error=nao-logado" );
}