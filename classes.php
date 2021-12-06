<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_GET["bloco"])) {
    header('Location: blocos.php');
}
require_once "config/config.php";
require_once "src/service/ApiService.php";

$api = new ApiService();

$classes = $api->get(config::uri() . "/classesByBloco/" . $_GET["bloco"]);

require_once "template/header.php";
?>
    <?php var_dump($classes)?>
    <div class="row">

        <?php foreach ($classes as $class) { ?>
            <div class="col-6 tile tile-class" data-id = "<?= $class->id ?>" data-name = "<?= $class->name ?>">
                <?= $class->name ?>
            </div>
        <?php } ?>

    </div>


<?php
require_once "template/footer.php";