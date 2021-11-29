<?php
require_once "src/service/ApiService.php";
require_once "config/config.php";
if(isset($_GET['save'])){
   $service = new service();

   $service->save($_GET['item'], $_GET['class'], $_GET['className']);
}else{

}


class service
{

    public function save($itemId, $classId, $className){
        $api = new ApiService();


        $data = $api->get(config::uri() . "/save/" . $itemId . "/" . $classId);



        $erro = "";
        if($data == null && $data == "erro"){
            $erro = "erro=$erro";
        }

        header("location:" . config::frontUri() . "/workspace.php?class=$classId&name=$className&lastAdd=$itemId&$erro");


    }

}