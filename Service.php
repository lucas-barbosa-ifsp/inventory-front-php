<?php
require_once "src/service/ApiService.php";
require_once "config/config.php";
if(isset($_GET['save'])){
   $service = new service();
   $service->save($_GET['item'], $_GET['class'], $_GET['className']);
}
if(isset($_GET['add-patrimony'])){
    $service = new service();

    $service->addPatrimony(trim($_GET['descricao']), $_GET['class'], $_GET['className']);
}


class service
{

    public function save($itemId, $classId, $className){
        $api = new ApiService();
        if(isset($_COOKIE['token'])){
            $data = $api->get(config::uri() . "/save/" . $itemId . "/" . $classId . "/" . $_COOKIE['email']);
        }else{
            setcookie("token", "", -3600);
            setcookie("email", "", -3600);
            header("location: /error=nao-logado");
        }

        $erro = "";
        if($data == null && $data == "erro"){
            $erro = "erro=$erro";
        }

        header("location:/workspace.php?class=$classId&name=$className&lastAdd=$itemId&$erro");

    }

    public function addPatrimony($descrição, $classId, $className){
        $api = new ApiService();
        if(isset($_COOKIE['token'])){
            $patrimony = ["descricao" => $descrição];

            $data = $api->post(config::uri() . "/addPatrimony/"  . $classId . "/" . $_COOKIE['email'], json_encode($patrimony));

        }else{
            setcookie("token", "", -3600);
            setcookie("email", "", -3600);
            header("location: /error=nao-logado");
        }
        $itemId = 0;
        $erro = "";
        if($data == null && $data == "erro"){
            $erro = "erro=$erro";
        }else{
            $itemId = $data->patrimony->id;
        }

        header("location:/workspace.php?class=$classId&name=$className&lastAdd=$itemId&$erro");

    }

}