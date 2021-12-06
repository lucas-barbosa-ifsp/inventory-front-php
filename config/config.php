<?php

class config
{

    public static function uri(){

        $local = true;
        return $local ? "http://localhost:8080" : "http://10.115.50.63:8080";
    }
    public static function frontUri(){
        return "http://200.133.222.32";
    }
}