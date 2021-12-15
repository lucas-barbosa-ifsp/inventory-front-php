<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_GET["bloco"])) {
    header('Location: blocos.php');
}
require_once "config/cookies.php";
require_once "config/config.php";
require_once "src/service/ApiService.php";

$api = new ApiService();

$classes = $api->get(config::uri() . "/classesByBloco/" . $_GET["bloco"]);

require_once "template/header.php";
?>
    <div class = "row text-center"><a href = "/blocos.php" class = "btn btn-success col-2"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Voltar</a><h2 class = "col-8">Escolha uma sala para começar a registrar os patrimônios</h2></div>
    <div class="row">

        <?php foreach ($classes as $class) { ?>
            <div class="col-6 tile tile-class" data-id = "<?= $class->id ?>" data-name = "<?= $class->name ?>">
                <?= $class->name ?>
            </div>
        <?php } ?>

    </div>


<?php
require_once "template/footer.php";