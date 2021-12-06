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


    public function post($url, $data)
    {
        try{
            $curl = new CurlUtils();
            $data = $curl->callAPI("POST", $url, $data);

        }catch (Exception $ex){
            print_r("Falha ao buscar");

        }
        return json_decode($data);

    }


}