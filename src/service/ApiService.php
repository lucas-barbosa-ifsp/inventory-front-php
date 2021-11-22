<?php
require_once "CurlUtils.php";

class ApiService
{

    public function get($url)
    {
        $data = null;
        try{
            $curl = new CurlUtils();
            $data = $curl->callAPI("GET", $url, false);

        }catch (Exception $ex){
            print_r("Falha ao buscar");

        }
        return json_decode($data);

    }
}